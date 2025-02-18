<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    ?>
    <script type="text/javascript">                     
		function doSearchproject(){
            $('#dgproject').datagrid('load',{
				namaprojectcari: $('#namaprojectcari').textbox('getValue')
			});
		}

        function aksiproject(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
			if(parseInt(akses_proses)===1){
				var a = '<a href="javascript:void(0)" title="Update" onclick="editproject(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
				var b = '<a href="javascript:void(0)" title="Hapus" onclick="destroyproject(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
			} else {
				var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
				var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:5px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
			}
            return a+b;
        }  

    </script> 
    
    <script type="text/javascript">
    $(function(){
        $("#dgproject").datagrid({
            onDblClickRow: function() {
                editproject();
            }            
        });
        /*
        $('#ttd2project').filebox({
            buttonText: 'Pilih File',
            buttonAlign: 'left'
        })
        */        
    });
    </script>
    <table id="dgproject" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_project.php" pageSize="20"        
    		toolbar="#toolbarproject" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
				<!--<th field="aksiproject" width="80" align="center" halign="center" data-options="formatter:aksiproject">AKSI</th>-->
                <th field="kd_project_sapproject" width="200" align="center" halign="center">Kode SAP</th>
    			<th field="nama_projectproject" width="500" align="left" halign="left">Nama Project</th>
                <th field="statusproject" width="140" align="center" halign="center">Status</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarproject" style="background-color:#fff;">
    	<div id="tbproject" style="padding:3px">
            <table>
            <tr>
                <td>Nama Project</td>
                <td>&nbsp;</td>
                <td>
                    <input class="easyui-textbox" id="namaprojectcari" name="namaprojectcari" data-options="required:false" style="width: 140px;">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchproject()" style="min-width:90px;">Search</a>
					<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-download" plain="false" onclick="loadproject()" style="min-width:90px;">Load Project Simkoin</a>
                </td>
            </tr>
            </table>
    	</div>                
    </div>
    
    <script type="text/javascript">
    	var url;
    	function loadproject(){
            $.messager.confirm('Konfirmasi','Load project dari Simkoin?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses load data Project dari Simkoin...'});
                    $.post('getprojectmanual.php',{},function(result){
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
                        $('#dgproject').datagrid('reload');
                    },'json');
                }
            });
    	}
        //$("#dgproject").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmproject{
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