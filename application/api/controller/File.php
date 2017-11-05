<?php

namespace app\api\controller;

use think\Request;

class File extends base
{
    /**
     * @param Request $request
     * @param string $dir
     * @return mixed|\think\response\Json
     */
    public function upload(Request $request, $dir = "")
    {
        $return = [
            'success' => 0,
            'message' => '',
            "url" => ""
        ];

        $files = $request->file();
        if (!$files) {
            $return['message'] = "没有文件被上传";
            return json($return);
        }
        /**@var \think\File $file */
        $file = array_values($files)[0];
        if (!$file->checkImg()) {
            $return['message'] = "只能上传图像";
            return json($return);
        }
        $OSS = new OSSHelper;
        $url = $OSS->upload($file, $dir);
        if (!$url) {
            $return['message'] = $OSS->getError();
            return json($return);
        }

        if ($request->has("CKEditorFuncNum")) return $this->CKEditorHandle($request, $url);

        $return['success'] = 1;
        $return['url'] = $url;
        $return['fileName'] = $file->getFilename();
        $return['message'] = "上传成功";
        return json($return);
    }

    protected function CKEditorHandle(Request $request, $url)
    {
        $script = <<<SCRIPT
<script type="text/javascript">
    window.parent.CKEDITOR.tools.callFunction("{funid}", "{url}", "{msg}");
</script>
SCRIPT;
        $replace = [
            '{funid}' => $request->request("CKEditorFuncNum"),
            '{url}' => $url,
            '{msg}' => ""
        ];
        return str_replace(array_keys($replace), array_values($replace), $script);
    }
}
