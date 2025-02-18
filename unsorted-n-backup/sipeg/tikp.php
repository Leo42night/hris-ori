<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/";
    include "koneksi.php";
    include "koneksi_sipeg.php";
    ?>
    <script type="text/javascript">                     
		function doSearchtikp(){
            $('#dgtikp').datagrid('load',{
				niptikpcari: $('#niptikpcari').textbox('getValue'),
				tahuntikpcari: $('#tahuntikpcari').numberbox('getValue'),
			});
		}
        
        function onSelectkelompoktikpcari(){
            var nilai1 = $('#kelompoktikpcari').combobox('getValue');
            var nilai2 = $('#kd_regiontikpcari').combobox('getValue');
            var nilai3 = $('#kd_cabangtikpcari').combobox('getValue');
            var url1 = 'get_spktikpcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktikpcari').combogrid('clear');
            $('#no_spktikpcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikpcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontikpcari(){
            var nilai1 = $('#kelompoktikpcari').combobox('getValue');
            var nilai2 = $('#kd_regiontikpcari').combobox('getValue');
            var nilai3 = $('#kd_cabangtikpcari').combobox('getValue');
            var url1 = 'get_spktikpcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtikpcari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangtikpcari').combobox('enable');
            $('#kd_cabangtikpcari').combobox('clear'); 
            $('#kd_cabangtikpcari').combobox('reload',url2);
            $('#kd_cabangtikpcari').combobox('setValue','000');

            $('#no_spktikpcari').combogrid('clear');
            $('#no_spktikpcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikpcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtikpcari(){
            var nilai1 = $('#kelompoktikpcari').combobox('getValue');
            var nilai2 = $('#kd_regiontikpcari').combobox('getValue');
            var nilai3 = $('#kd_cabangtikpcari').combobox('getValue');
            var url1 = 'get_spktikpcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktikpcari').combogrid('clear');
            $('#no_spktikpcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikpcari').combogrid('setValue','SEMUA');
    	}

        function hariIni(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
        
            //return [year, month, day].join('-');
            return [year, month].join('-');
        }        
        
        function onSelectblthtikpcari(){
            var nilai1 = $('#blthtikpcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoktikp(){
            var nilai1 = $('#kelompoktikp').combobox('getValue');
            var nilai2 = $('#kd_regiontikp').combobox('getValue');
            var nilai3 = $('#kd_cabangtikp').combobox('getValue');
            var url1 = 'get_spktikp.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktikp').combogrid('clear');
            $('#no_spktikp').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikp').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontikp(){
            var nilai1 = $('#kelompoktikp').combobox('getValue');
            var nilai2 = $('#kd_regiontikp').combobox('getValue');
            var nilai3 = $('#kd_cabangtikp').combobox('getValue');
            var url1 = 'get_spktikp.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtikp.php?kd_region='+nilai2;
            $('#kd_cabangtikp').combobox('enable');
            $('#kd_cabangtikp').combobox('clear'); 
            $('#kd_cabangtikp').combobox('reload',url2);
            $('#kd_cabangtikp').combobox('setValue','000');
			
            $('#no_spktikp').combogrid('clear');
            $('#no_spktikp').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikp').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtikp(){
            var nilai1 = $('#kelompoktikp').combobox('getValue');
            var nilai2 = $('#kd_regiontikp').combobox('getValue');
            var nilai3 = $('#kd_cabangtikp').combobox('getValue');
            var url1 = 'get_spktikp.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spktikp').combogrid('clear');
            $('#no_spktikp').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikp').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontikp2(){
            var nilai1 = $('#kd_regiontikp2').combobox('getValue');
            var url2 = 'get_cabangtikp2.php?kd_region='+nilai1;
            $('#kd_cabangtikp2').combobox('enable');
            $('#kd_cabangtikp2').combobox('clear'); 
            $('#kd_cabangtikp2').combobox('reload',url2);
            $('#kd_cabangtikp2').combobox('setValue','000');
    	}
        
        function onSelectprojecttikp(){
            var nilai1 = $('#kd_projecttikp').combobox('getValue');
            var url2 = 'get_unittikp.php?kd_project='+nilai1;
            $('#kd_unittikp').combobox('enable');
            $('#kd_unittikp').combobox('clear'); 
            $('#kd_unittikp').combobox('reload',url2);
    	}
        
        function onSelectprojecttikp2(){
            var nilai1 = $('#kd_projecttikp2').combobox('getValue');
            var url2 = 'get_unittikp2.php?kd_project='+nilai1;
            $('#kd_unittikp2').combobox('enable');
            $('#kd_unittikp2').combobox('clear'); 
            $('#kd_unittikp2').combobox('reload',url2);
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

		function sliptikp(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niptikp+'|'+row.blthtikp+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgtikp").datagrid({
            onDblClickRow: function() {
                //edittikp();
            }
        });
    });
    </script>
    <table id="dgtikp" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_tikp.php" pageSize="20"        
    		toolbar="#toolbartikp" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
    			<th field="blthtikp" width="80" align="center" halign="center">BLTH</th>
    			<th field="tahuntikp" width="100" align="center" halign="center">Periode</th>
    			<th field="niptikp" width="100" align="center" halign="center">NIP</th>
    			<th field="nama_lengkaptikp" width="250" align="left" halign="center">Nama</th>
    			<th field="bonustikp" width="120" align="right" halign="center" formatter="formatrp2">Dibayarkan</th>
                <th field="bank_payrolltikp" width="100" align="center" halign="center">Bank</th>
                <th field="no_rek_payrolltikp" width="140" align="center" halign="center">Rekening</th>
                <th field="an_payrolltikp" width="220" align="left" halign="center">Atas Nama</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbartikp">
    	<div id="tbtikp" style="padding:3px">
            <table>
            <tr>
                <td>Tahun Realisasi</td>
                <td>
                    <input class="easyui-numberbox" id="tahuntikpcari" name="tahuntikpcari" value="<?=date('Y');?>" data-options="required:true,min:2018" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/Nama</td>
                <td>
                    <input class="easyui-textbox" id="niptikpcari" name="niptikpcari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchtikp()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosestikp()" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resettikp()" style="min-width:90px;">Reset</a>                    
        -->
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-cog" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-reply" style="min-width:90px;">Reset</a>                    
        <a target="_blank" href="<?=$foldernya;?>template/Templateikp.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;margin-left:10px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatetikp()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>

    </div>

    
    <div id="dlgtikp" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstikp">
    	<form id="fmtikp" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Bulan Bayar</td>
                <td><input class="easyui-datebox" id="blthtikp" name="blthtikp" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Tgl Hari Raya</td>
                <td><input class="easyui-datebox" id="tgl_tikptikp" name="tgl_tikptikp" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Pegawai</td>
                <td><input class="easyui-numberbox" id="koefisien1tikp" name="koefisien1tikp" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Honorarium</td>
                <td><input class="easyui-numberbox" id="koefisien2tikp" name="koefisien2tikp" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstikp">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetikp()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtikp').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgtikp2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstikp2">
    	<form id="fmtikp2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Tahun</td>
                <td><input class="easyui-numberbox" id="tahuntikp2" name="tahuntikp2" data-options="required:true,min:2022" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstikp2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetikp2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtikp2').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    
    <div id="dlgtemplatetikp" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatetikp">
    	<form id="fmtemplatetikp" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatetikp" name="file_templatetikp" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatetikp">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatetikp()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatetikp').dialog('close')" style="min-width:90px">Batal</a>
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
    	function prosestikp(){
            var blthnya = $("#blthtikpcari").datebox('getValue');
    		$('#dlgtikp').dialog('open').dialog('setTitle','Proses Pembayaran Cuti');
    		$('#fmtikp').form('clear');
            $("#blthtikp").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_tikp.php';
    	}
    	function savetikp(){
            //alert(url);
            $.messager.progress({height:75, text:'Proses tikp'});
            $('#dlgtikp').dialog('close');
            $('#fmtikp').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
                },
                success: function(result){
                    //alert(result);    
                    $.messager.progress('close');
                    if (result.errorMsg){
                        var result = eval('('+result+')');
                        $.messager.alert('Result',result.errorMsg,'info');
                        /*
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });\
                        */
                    } else {
                        $('#dlgtikp').dialog('close');
                        $('#dgtikp').datagrid('reload');
                    }
                }
            });
    	}
    	function resettikp(){
            var blthnya = $("#blthtikpcari").datebox('getValue');
    		$('#dlgtikp2').dialog('open').dialog('setTitle','Reset tikp');
    		$('#fmtikp2').form('clear');
            $("#blthtikp2").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_tikp2.php';
    	}
    	function savetikp2(){
            //alert(url);
            $.messager.progress({height:75, text:'Reset tikp'});
            $('#dlgtikp2').dialog('close');
            $('#fmtikp2').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
                },
                success: function(result){
                    //alert(result);    
                    $.messager.progress('close');
                    if (result.errorMsg){
                        var result = eval('('+result+')');
                        $.messager.alert('Result',result.errorMsg,'info');
                        /*
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });\
                        */
                    } else {
                        $('#dlgtikp2').dialog('close');
                        $('#dgtikp').datagrid('reload');
                    }
                }
            });
    	}
        function downloadtikp(){
            var blthnya = $('#blthtikpcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_tikproll.php?blth="+blthnya,"_blank");
        }
        /*
    	function prosestikp2(){
            var blthnya = $("#blthtikpcari").datebox('getValue');
    		$('#dlgtikp2').dialog('open').dialog('setTitle','Reset tikproll Kolektif');
    		$('#fmtikp2').form('clear');
            $("#blthtikp2").datebox('setValue', blthnya);
    		url2 = 'save_tikp2.php';
    	}
    	function savetikp2(){
			var spknya = $('#no_spktikp2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset tikproll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset tikproll'});
                    $('#dlgtikp2').dialog('close');
            		$('#fmtikp2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlgtikp2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlgtikp2').dialog('close');
            					$('#dgtikp').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function edittikp(){
    		var row = $('#dgtikp').datagrid('getSelected');
    		if (row){
    			$('#dlgtikp3').dialog('open').dialog('setTitle','Proses tikproll Per Pegawai');
                $('#fmtikp3').form('clear');
    			$('#fmtikp3').form('load',row);            
    			url = 'save_tikp3.php';
    		}
    	}
    	function destroytikp(){
    		var row = $('#dgtikp').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus tikp "'+row.nama_tikp+'"?',function(r){
    				if (r){
    					$.post('destroy_tikp.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dgtikp').datagrid('reload');
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
  
    	function cetakslip2(){
            var ids = [];
            var rows = $('#dgtikp').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtikp);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthtikpcari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projecttikpcari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unittikpcari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenistikpcari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategoritikpcari").combobox('getValue');
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_lategorinya2;
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2;
            //alert(urlnya);
            //alert(blthnya2+" "+kd_regionalnya2+" "+kd_unitnya2+" "+kd_jenisnya2+" "+kd_kategorinya2);
    		$('#dlglist').dialog('open').dialog('setTitle','List Gaji');
            $('#panellist').prop('src','cetaklist.php[not_found]?blth='+blthnya2+'&kd_project='+kd_projectnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_kategorinya2);
        }
        */
  
    	function cetakslip(data){
            var datanya = data.split("|");
            var nip = datanya[0];
            var blth = datanya[1];
            window.open('<?=$foldernya;?>cetakslip.php?nip='+nip+'&blth='+blth,'_blank');
        }
    	function cetakslip2(){
            var blthnya = $("#blthtikpcari").datebox('getValue');
            var ids = [];
            var rows = $('#dgtikp').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtikp);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function gajipegawai(){
            var blthnya = $('#blthtikpcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function gajihonor(){
            var blthnya = $('#blthtikpcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function gajirekap(){
            var blthnya = $('#blthtikpcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        

    	function uploadtemplatetikp(){
    		$('#dlgtemplatetikp').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatetikp').form('clear');
    		url = '<?=$foldernya;?>save_templatetikp.php';
    	}
    	function savetemplatetikp(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatetikp').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    $.messager.progress('close');
                    // alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgtemplatetikp').dialog('close');
    					$('#dgtikp').datagrid('reload');
    				}
    			}
    		});
    	}
        
        //$("#dgtikp").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmtikp{
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
    	.fitemtikp{
    		margin-bottom:5px;
    	}
    	.fitemtikp label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemtikp input{
    		width:200px;
    	}
    	#fmtikp.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>