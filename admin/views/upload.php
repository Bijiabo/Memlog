<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>upload</title>
    <link rel="stylesheet" href="./views/css/bootstrap.min.css">
    <link rel="stylesheet" href="./views/css/todc-bootstrap.min.css"/>
    <link href="./views/css/css-att.css" type="text/css" rel="stylesheet">
<script>
function uploadfile(){
	var as_logid = parent.document.getElementById('as_logid').value
	document.upload.action = "attachment.php?action=upload&logid="+as_logid;
	document.upload.submit();
}
function showupload(multi){
	var as_logid = parent.document.getElementById('as_logid').value
	window.location.href="attachment.php?action=selectFile&logid="+as_logid+"&multi="+multi;	
}
function showattlib(){
	var as_logid = parent.document.getElementById('as_logid').value
	window.location.href="attachment.php?action=attlib&logid="+as_logid;	
}
function addattachfrom() {
	var newnode = document.getElementById('attachbodyhidden').firstChild.cloneNode(true);
	document.getElementById('attachbody').appendChild(newnode);
}
function removeattachfrom() {
	document.getElementById('attachbody').childNodes.length > 1 && document.getElementById('attachbody').lastChild ? document.getElementById('attachbody').removeChild(document.getElementById('attachbody').lastChild) : 0;
}
</script>
<body>
    <div id="media-upload-header">
        <span id="curtab"><a href="javascript:showupload(0);">上传附件</a></span>
        <span><a href="javascript:showupload(1);">批量上传</a></span>
        <span><a href="javascript:showattlib();">附件库（<?php echo $attachnum; ?>）</a></span>
    </div>
    <form enctype="multipart/form-data" method="post" name="upload" action="">
        <div id="media-upload-body">
            <p>(单个附件最大：<?php echo $maxsize ;?>，允许类型：<?php echo $att_type_str; ?>)
            <div id="attachbodyhidden" style="display:none"><span><input type="file" name="attach[]" class="btn btn-default" style="margin-top: 10px;"></span></div>
            <div id="attachbody" class="form-inline">
                <div class="form-group">
                    <input type="file" name="attach[]" class="btn btn-default"/>
                </div>
                <div class="form-group">
                    <input type="button" name="html-upload" value="上传" onclick="uploadfile();" class="btn btn-primary"/>
                </div>
                <div class="form-group">
                    <a id="attach" title="增加附件" onclick="addattachfrom()" href="javascript:;" name="attach" class="btn btn-default"> + </a>
                </div>
                <div class="form-group">
                    <a id="attach" title="减少附件" onclick="removeattachfrom()" href="javascript:;" name="attach" class="btn btn-default"> - </a>
                </div>
            </div>
            </p>
        </div>
    </form>
</body>
</html>