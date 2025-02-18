<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    ?>
    <script type="text/javascript">                     
		function doSearchtpesangon(){
            $('#dgtpesangon').datagrid('load',{
				niptpesangoncari: $('#niptpesangoncari').textbox('getValue'),
				blthtpesangoncari: $('#blthtpesangoncari').datebox('getValue'),
			});
		}
        function aksitpesangon(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update" onclick="edittpesangon(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus" onclick="destroytpesangon(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  
        
        function formatrp2(val,row){
            if(val===""){
                return "";
            } else {
                return number_format2(val,0,',','.');
            }
        };
        
        function number_format2(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }
        
        function formatrp3(val,row){
            if(val===""){
                return "";
            } else {
                return number_format3(val,3,',','.');
            }
        };
        
        function number_format3(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }
        
        function formatrp4(val,row){
            if(val===""){
                return "";
            } else {
                return number_format4(val,2,',','.');
            }
        };
        
        function number_format4(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }

		function sliptpesangon(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niptpesangon+'|'+row.blthtpesangon+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
            return by2;
		}
        function stylerpendapatan(value,row,index){
            return 'background: #93CAED;';
		}
        function stylerbenefit(value,row,index){
            return 'background: #C7E4EE;';
		}
        function stylerupah(value,row,index){
            return 'background: #ACD1AF;';
		}
        function stylerpotongan(value,row,index){
            return 'background: #F47174;';
		}

    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgtpesangon").datagrid({
            onDblClickRow: function() {
                //edittpesangon();
            }
        });
    });
    </script>
    <table id="dgtpesangon" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_tpesangon.php" pageSize="20"        
    		toolbar="#toolbartpesangon" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksitpesangon" width="80" align="center" halign="center" data-options="formatter:aksitpesangon,styler:styler1">Aksi</th>
    			<th field="blthtpesangon" width="80" align="center" halign="center">BLTH</th>
    			<th field="niptpesangon" width="100" align="center" halign="center">NIP</th>
    			<th field="nama_lengkaptpesangon" width="250" align="left" halign="center">Nama</th>
    			<th field="uang_pesangontpesangon" width="100" align="right" halign="center" formatter="formatrp2">Rupiah</th>
                <th field="bank_payrolltpesangon" width="100" align="center" halign="center">Bank</th>
                <th field="no_rek_payrolltpesangon" width="140" align="center" halign="center">Rekening</th>
                <th field="an_payrolltpesangon" width="220" align="left" halign="center">Atas Nama</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbartpesangon">
    	<div id="tbtpesangon" style="padding:3px">
            <table>
            <tr>
                <td>BLTH</td>
                <td>
                    <input class="easyui-datebox" id="blthtpesangoncari" name="blthtpesangoncari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niptpesangoncari" name="niptpesangoncari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchtpesangon()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addtpesangon()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
    	</div>	
    </div>

    
    <div id="dlgtpesangon" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonstpesangon">
    	<form id="fmtpesangon" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Bulan</td>
                <td><input class="easyui-datebox" id="blthtpesangon" name="blthtpesangon" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 150px;" readonly></td>
            </tr>  
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="niptpesangon" name="niptpesangon" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Rupiah</td>
                <td><input class="easyui-numberbox" id="uang_pesangontpesangon" name="uang_pesangontpesangon" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstpesangon">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetpesangon()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtpesangon').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <script type="text/javascript">
    	function myformatter(date){
    		var y = date.getFullYear();
    		var m = date.getMonth()+1;
    		var d = date.getDate();
    		return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    	}
    	function myparser(s){
    		if (!s) return new Date();
    		var ss = (s.split('-'));
    		var y = parseInt(ss[0],10);
    		var m = parseInt(ss[1],10);
    		var d = parseInt(ss[2],10);
    		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
    			return new Date(y,m-1,d);
    		} else {
    			return new Date();
    		}
    	}

    	function myformatter2(date){
    		var y = date.getFullYear();
    		var m = date.getMonth()+1;
    		var d = date.getDate();
    		//return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    		return y+'-'+(m<10?('0'+m):m);
    	}
    	function myparser2(s){
    		if (!s) return new Date();
    		var ss = (s.split('-'));
    		var y = parseInt(ss[0],10);
    		var m = parseInt(ss[1],10);
    		if (!isNaN(y) && !isNaN(m)){
    			return new Date(y,m-1);
    		} else {
    			return new Date();
    		}
    	}
    </script>
    <script type="text/javascript">
    	var url, url2;
    	function addtpesangon(){
    		$('#dlgtpesangon').dialog('open').dialog('setTitle','Input Pesangon');
    		$('#fmtpesangon').form('clear');
            var blthtpesangon = $("#blthtpesangoncari").datebox('getValue');
            $("#blthtpesangon").datebox('setValue',blthtpesangon);
    		url = '<?=$foldernya;?>save_tpesangon.php';
    	}
    	function edittpesangon(index){
            var row = $('#dgtpesangon').datagrid('getRow', index);
    		if (row){
                $('#dlgtpesangon').dialog('open').dialog('setTitle','Update Pesangon');
                $('#fmtpesangon').form('clear');
    			$('#fmtpesangon').form('load',row); 
                url = '<?=$foldernya;?>update_tpesangon.php?id='+row.idtpesangon;  
            }          
    	}
    	function savetpesangon(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmtpesangon').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    //alert(result);
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgtpesangon').dialog('close');
                        $('#dgtpesangon').datagrid('reload');
                    }
                }
            });
    	}
    	function destroytpesangon(index){
            var row = $('#dgtpesangon').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_tpesangon.php',{id:row.idtpesangon},function(result){
    						if (result.success){
    							$('#dgtpesangon').datagrid('reload');	// reload the user data
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}
        
        //$("#dgtpesangon").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmtpesangon{
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
    	.fitemtpesangon{
    		margin-bottom:5px;
    	}
    	.fitemtpesangon label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemtpesangon input{
    		width:200px;
    	}
    	#fmtpesangon.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>