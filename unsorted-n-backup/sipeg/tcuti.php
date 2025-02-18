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
		function doSearchtcuti(){
            $('#dgtcuti').datagrid('load',{
				niptcuticari: $('#niptcuticari').textbox('getValue'),
				blthtcuticari: $('#blthtcuticari').datebox('getValue'),
			});
		}
        
        function onSelectkelompoktcuticari(){
            var nilai1 = $('#kelompoktcuticari').combobox('getValue');
            var nilai2 = $('#kd_regiontcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangtcuticari').combobox('getValue');
            var url1 = 'get_spktcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktcuticari').combogrid('clear');
            $('#no_spktcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktcuticari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontcuticari(){
            var nilai1 = $('#kelompoktcuticari').combobox('getValue');
            var nilai2 = $('#kd_regiontcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangtcuticari').combobox('getValue');
            var url1 = 'get_spktcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtcuticari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangtcuticari').combobox('enable');
            $('#kd_cabangtcuticari').combobox('clear'); 
            $('#kd_cabangtcuticari').combobox('reload',url2);
            $('#kd_cabangtcuticari').combobox('setValue','000');

            $('#no_spktcuticari').combogrid('clear');
            $('#no_spktcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktcuticari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtcuticari(){
            var nilai1 = $('#kelompoktcuticari').combobox('getValue');
            var nilai2 = $('#kd_regiontcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangtcuticari').combobox('getValue');
            var url1 = 'get_spktcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktcuticari').combogrid('clear');
            $('#no_spktcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktcuticari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthtcuticari(){
            var nilai1 = $('#blthtcuticari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoktcuti(){
            var nilai1 = $('#kelompoktcuti').combobox('getValue');
            var nilai2 = $('#kd_regiontcuti').combobox('getValue');
            var nilai3 = $('#kd_cabangtcuti').combobox('getValue');
            var url1 = 'get_spktcuti.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktcuti').combogrid('clear');
            $('#no_spktcuti').combogrid('grid').datagrid('reload',url1);
            $('#no_spktcuti').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontcuti(){
            var nilai1 = $('#kelompoktcuti').combobox('getValue');
            var nilai2 = $('#kd_regiontcuti').combobox('getValue');
            var nilai3 = $('#kd_cabangtcuti').combobox('getValue');
            var url1 = 'get_spktcuti.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtcuti.php?kd_region='+nilai2;
            $('#kd_cabangtcuti').combobox('enable');
            $('#kd_cabangtcuti').combobox('clear'); 
            $('#kd_cabangtcuti').combobox('reload',url2);
            $('#kd_cabangtcuti').combobox('setValue','000');
			
            $('#no_spktcuti').combogrid('clear');
            $('#no_spktcuti').combogrid('grid').datagrid('reload',url1);
            $('#no_spktcuti').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtcuti(){
            var nilai1 = $('#kelompoktcuti').combobox('getValue');
            var nilai2 = $('#kd_regiontcuti').combobox('getValue');
            var nilai3 = $('#kd_cabangtcuti').combobox('getValue');
            var url1 = 'get_spktcuti.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spktcuti').combogrid('clear');
            $('#no_spktcuti').combogrid('grid').datagrid('reload',url1);
            $('#no_spktcuti').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontcuti2(){
            var nilai1 = $('#kd_regiontcuti2').combobox('getValue');
            var url2 = 'get_cabangtcuti2.php?kd_region='+nilai1;
            $('#kd_cabangtcuti2').combobox('enable');
            $('#kd_cabangtcuti2').combobox('clear'); 
            $('#kd_cabangtcuti2').combobox('reload',url2);
            $('#kd_cabangtcuti2').combobox('setValue','000');
    	}
        
        function onSelectprojecttcuti(){
            var nilai1 = $('#kd_projecttcuti').combobox('getValue');
            var url2 = 'get_unittcuti.php?kd_project='+nilai1;
            $('#kd_unittcuti').combobox('enable');
            $('#kd_unittcuti').combobox('clear'); 
            $('#kd_unittcuti').combobox('reload',url2);
    	}
        
        function onSelectprojecttcuti2(){
            var nilai1 = $('#kd_projecttcuti2').combobox('getValue');
            var url2 = 'get_unittcuti2.php?kd_project='+nilai1;
            $('#kd_unittcuti2').combobox('enable');
            $('#kd_unittcuti2').combobox('clear'); 
            $('#kd_unittcuti2').combobox('reload',url2);
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

		function sliptcuti(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niptcuti+'|'+row.blthtcuti+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgtcuti").datagrid({
            onDblClickRow: function() {
                //edittcuti();
            }
        });
    });
    </script>
    <table id="dgtcuti" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_tcuti.php" pageSize="20"        
    		toolbar="#toolbartcuti" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
    			<th rowspan="2" field="blthtcuti" width="80" align="center" halign="center">BLTH</th>
    			<th rowspan="2" field="niptcuti" width="100" align="center" halign="center">NIP</th>
    			<th rowspan="2" field="nama_lengkaptcuti" width="250" align="left" halign="center">Nama</th>
                <th colspan="2">Periode Masa Kerja</th>
    			<th rowspan="2" field="uang_cutitcuti" width="100" align="right" halign="center" formatter="formatrp2">Rupiah</th>
                <th rowspan="2" field="bank_payrolltcuti" width="100" align="center" halign="center">Bank</th>
                <th rowspan="2" field="no_rek_payrolltcuti" width="140" align="center" halign="center">Rekening</th>
                <th rowspan="2" field="an_payrolltcuti" width="220" align="left" halign="center">Atas Nama</th>
    		</tr>
    		<tr>
    			<th field="blth_awaltcuti" width="80" align="center" halign="center">Awal</th>
                <th field="blth_akhirtcuti" width="80" align="center" halign="center">Akhir</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbartcuti">
    	<div id="tbtcuti" style="padding:3px">
            <table>
            <tr>
                <td>BLTH</td>
                <td>
                    <input class="easyui-datebox" id="blthtcuticari" name="blthtcuticari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niptcuticari" name="niptcuticari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchtcuti()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosestcuti()" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resettcuti()" style="min-width:90px;">Reset</a>                    
        -->
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-cog" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-reply" style="min-width:90px;">Reset</a>                    
        <a target="_blank" href="<?=$foldernya;?>template/Templatecuti.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;margin-left:10px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatetcuti()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>

    </div>

    
    <div id="dlgtcuti" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstcuti">
    	<form id="fmtcuti" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Bulan Bayar</td>
                <td><input class="easyui-datebox" id="blthtcuti" name="blthtcuti" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Tgl Hari Raya</td>
                <td><input class="easyui-datebox" id="tgl_tcutitcuti" name="tgl_tcutitcuti" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Pegawai</td>
                <td><input class="easyui-numberbox" id="koefisien1tcuti" name="koefisien1tcuti" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Honorarium</td>
                <td><input class="easyui-numberbox" id="koefisien2tcuti" name="koefisien2tcuti" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstcuti">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetcuti()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtcuti').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgtcuti2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstcuti2">
    	<form id="fmtcuti2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Tahun</td>
                <td><input class="easyui-numberbox" id="tahuntcuti2" name="tahuntcuti2" data-options="required:true,min:2022" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstcuti2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetcuti2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtcuti2').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    
    <div id="dlgtemplatetcuti" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatetcuti">
    	<form id="fmtemplatetcuti" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatetcuti" name="file_templatetcuti" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatetcuti">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatetcuti()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatetcuti').dialog('close')" style="min-width:90px">Batal</a>
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
    	function prosestcuti(){
            var blthnya = $("#blthtcuticari").datebox('getValue');
    		$('#dlgtcuti').dialog('open').dialog('setTitle','Proses Pembayaran Cuti');
    		$('#fmtcuti').form('clear');
            $("#blthtcuti").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_tcuti.php';
    	}
    	function savetcuti(){
            //alert(url);
            $.messager.progress({height:75, text:'Proses tcuti'});
            $('#dlgtcuti').dialog('close');
            $('#fmtcuti').form('submit',{
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
                        $('#dlgtcuti').dialog('close');
                        $('#dgtcuti').datagrid('reload');
                    }
                }
            });
    	}
    	function resettcuti(){
            var blthnya = $("#blthtcuticari").datebox('getValue');
    		$('#dlgtcuti2').dialog('open').dialog('setTitle','Reset tcuti');
    		$('#fmtcuti2').form('clear');
            $("#blthtcuti2").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_tcuti2.php';
    	}
    	function savetcuti2(){
            //alert(url);
            $.messager.progress({height:75, text:'Reset tcuti'});
            $('#dlgtcuti2').dialog('close');
            $('#fmtcuti2').form('submit',{
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
                        $('#dlgtcuti2').dialog('close');
                        $('#dgtcuti').datagrid('reload');
                    }
                }
            });
    	}
        function downloadtcuti(){
            var blthnya = $('#blthtcuticari').datebox('getValue');
            window.open("<?=$foldernya;?>download_tcutiroll.php?blth="+blthnya,"_blank");
        }
        /*
    	function prosestcuti2(){
            var blthnya = $("#blthtcuticari").datebox('getValue');
    		$('#dlgtcuti2').dialog('open').dialog('setTitle','Reset tcutiroll Kolektif');
    		$('#fmtcuti2').form('clear');
            $("#blthtcuti2").datebox('setValue', blthnya);
    		url2 = 'save_tcuti2.php';
    	}
    	function savetcuti2(){
			var spknya = $('#no_spktcuti2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset tcutiroll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset tcutiroll'});
                    $('#dlgtcuti2').dialog('close');
            		$('#fmtcuti2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlgtcuti2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlgtcuti2').dialog('close');
            					$('#dgtcuti').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function edittcuti(){
    		var row = $('#dgtcuti').datagrid('getSelected');
    		if (row){
    			$('#dlgtcuti3').dialog('open').dialog('setTitle','Proses tcutiroll Per Pegawai');
                $('#fmtcuti3').form('clear');
    			$('#fmtcuti3').form('load',row);            
    			url = 'save_tcuti3.php';
    		}
    	}
    	function destroytcuti(){
    		var row = $('#dgtcuti').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus tcuti "'+row.nama_tcuti+'"?',function(r){
    				if (r){
    					$.post('destroy_tcuti.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dgtcuti').datagrid('reload');
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
            var rows = $('#dgtcuti').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtcuti);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthtcuticari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projecttcuticari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unittcuticari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenistcuticari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategoritcuticari").combobox('getValue');
            //var urlnya = 'cetaklist.php?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_lategorinya2;
            //var urlnya = 'cetaklist.php?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2;
            //alert(urlnya);
            //alert(blthnya2+" "+kd_regionalnya2+" "+kd_unitnya2+" "+kd_jenisnya2+" "+kd_kategorinya2);
    		$('#dlglist').dialog('open').dialog('setTitle','List Gaji');
            $('#panellist').prop('src','cetaklist.php?blth='+blthnya2+'&kd_project='+kd_projectnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_kategorinya2);
        }
        */
  
    	function cetakslip(data){
            var datanya = data.split("|");
            var nip = datanya[0];
            var blth = datanya[1];
            window.open('<?=$foldernya;?>cetakslip.php?nip='+nip+'&blth='+blth,'_blank');
        }
    	function cetakslip2(){
            var blthnya = $("#blthtcuticari").datebox('getValue');
            var ids = [];
            var rows = $('#dgtcuti').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtcuti);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function gajipegawai(){
            var blthnya = $('#blthtcuticari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function gajihonor(){
            var blthnya = $('#blthtcuticari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function gajirekap(){
            var blthnya = $('#blthtcuticari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        

    	function uploadtemplatetcuti(){
    		$('#dlgtemplatetcuti').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatetcuti').form('clear');
    		url = '<?=$foldernya;?>save_templatetcuti.php';
    	}
    	function savetemplatetcuti(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatetcuti').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    $.messager.progress('close');
                    //alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgtemplatetcuti').dialog('close');
    					$('#dgtcuti').datagrid('reload');
    				}
    			}
    		});
    	}
        
        //$("#dgtcuti").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmtcuti{
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
    	.fitemtcuti{
    		margin-bottom:5px;
    	}
    	.fitemtcuti label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemtcuti input{
    		width:200px;
    	}
    	#fmtcuti.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>