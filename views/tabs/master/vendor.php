<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi_sipeg.php";
    $foldernya = "sipeg/";
    ?>
    <script type="text/javascript">                     
		function doSearchvendor(){
            $('#dgvendor').datagrid('load',{
				namavendorcari: $('#namavendorcari').textbox('getValue')
			});
		}

        function aksivendor(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
			if(parseInt(akses_proses)===1){
				var a = '<a href="javascript:void(0)" title="Update" onclick="editvendor(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
				var b = '<a href="javascript:void(0)" title="Hapus" onclick="destroyvendor(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
			} else {
				var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
				var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
			}
            return a+b;
        }  

    </script> 
    
    <script type="text/javascript">
    $(function(){
        $("#dgvendor").datagrid({
            onDblClickRow: function() {
                editvendor();
            }            
        });
        /*
        $('#ttd2vendor').filebox({
            buttonText: 'Pilih File',
            buttonAlign: 'left'
        })
        */        
    });
    </script>
    <table id="dgvendor" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_vendor.php" pageSize="20"        
    		toolbar="#toolbarvendor" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
				<!--<th field="aksivendor" width="80" align="center" halign="center" data-options="formatter:aksivendor">AKSI</th>-->
                <th field="kd_vendorvendor" width="200" align="center" halign="center">Kode Vendor</th>
    			<th field="nama_vendorvendor" width="500" align="left" halign="left">Nama Vendor</th>
                <th field="validvendor" width="120" align="center" halign="center">Valid</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarvendor" style="background-color:#fff;">
    	<div id="tbvendor" style="padding:3px">
            <table>
            <tr>
                <td>Nama Vendor</td>
                <td>&nbsp;</td>
                <td>
                    <input class="easyui-textbox" id="namavendorcari" name="namavendorcari" data-options="required:false" style="width: 140px;">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchvendor()" style="min-width:90px;">Search</a>
					<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-download" plain="false" onclick="loadvendor()" style="min-width:90px;">Load Vendor</a>
                </td>
            </tr>
            </table>
    	</div>                
    </div>
    
    <script type="text/javascript">
    	var url;
    	function loadvendor(){
            $.messager.confirm('Konfirmasi','Load vendor dari SAP?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses load data vendor dari SAP...'});
                    $.post('<?=$foldernya;?>getvendormanual.php',{},function(result){
                        //alert(result);
                        $.messager.progress('close');
                        $.messager.alert({
                            title: 'Result',
                            msg: '<div style="max-height:300px;overflow:scroll;padding:10px;margin-top:0px;">'+result.resultMsg+'</div>',
                            icon: 'info',
                            width: 600,
                            height: 'auto',
                            maxHeight: 480
                        });
                        $('#dgvendor').datagrid('reload');
                    },'json');
                }
            });
    	}
        //$("#dgvendor").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmvendor{
    		margin:0;
    		padding:10px 10px;
    	}
    	.ftitle{
    		font-size:14px;
    		font-weight:bold;
    		padding:5px 0;
    		margin-bottom:10px;
    		border-bottom:1px solid #ccc;
    	}
    	.fitem{
    		margin-bottom:5px;
    	}
    	.fitem label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitem input{
    		width:200px;
    	}
    </style>
<?php    
}
?>