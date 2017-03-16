<?php $this->load->view('ckad/header') ?>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="/ckad">Home</a> <span class="divider">/</span>
        </li>
        <li>
            首页焦点图
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>预览</th>
                        <th>删除</th>
                        <th>上传</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($list as $k => $item): ?>
                        <tr>
                            <td><?php echo $k; ?></td>
                            <td><img class="avatar-medium" height="60" width="160" src="<?php echo $item['src'] ?>"></td>
                            <td><a href="/ckad/slider?delete=<?php echo $k; ?>">删除</a></td>
                            <td><a href="javascript:file_upload(<?php echo $k; ?>);">上传</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form accept-charset="UTF-8"  enctype="multipart/form-data" id="upload_form" method="post">
                <input type="hidden" id='img_id' name='img_id' />
                <input style="width:1px;" class="photo file" accept="image/gif,image/jpeg,image/png,image/pjpeg,image/x-png" id="slider_upload" name="slider_upload" type="file" <?php if (!$pro_info['logo']) { ?> dataType="Require" msg="支持jpg、jpeg、png、gif等格式；建议尺寸：590*438px或者长宽比例为4:3"<?php } ?>>
            </form>
            <div style="clear:both">
                <br/>
                <?php if (isset($pagination)): ?>
                    <?php echo $pagination; ?>
                <?php endif; ?>
            </div>				
        </div>
    </div><!--/span-->

</div>
<script language='javascript'>
    function file_upload(id)
    {
        $("#img_id").val(id);
        return $('#slider_upload').click();
    }
    $(function() {
        $("#slider_upload").change(function(){
            $("#upload_form").submit();
        });
    })
</script>
<?php
$this->load->view('ckad/footer')?>