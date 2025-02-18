<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/payroll/";    
    ?>
    <script type="text/javascript">                     
		function doSearchtwinduan(){
            $('#dgtwinduan').datagrid('load',{
				niptwinduancari: $('#niptwinduancari').textbox('getValue'),
				tahuntwinduancari: $('#tahuntwinduancari').numberbox('getValue'),
			});
		}
        
        function onSelectkelompoktwinduancari(){
            var nilai1 = $('#kelompoktwinduancari').combobox('getValue');
            var nilai2 = $('#kd_regiontwinduancari').combobox('getValue');
            var nilai3 = $('#kd_cabangtwinduancari').combobox('getValue');
            var url1 = 'get_spktwinduancari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktwinduancari').combogrid('clear');
            $('#no_spktwinduancari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktwinduancari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontwinduancari(){
            var nilai1 = $('#kelompoktwinduancari').combobox('getValue');
            var nilai2 = $('#kd_regiontwinduancari').combobox('getValue');
            var nilai3 = $('#kd_cabangtwinduancari').combobox('getValue');
            var url1 = 'get_spktwinduancari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtwinduancari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangtwinduancari').combobox('enable');
            $('#kd_cabangtwinduancari').combobox('clear'); 
            $('#kd_cabangtwinduancari').combobox('reload',url2);
            $('#kd_cabangtwinduancari').combobox('setValue','000');

            $('#no_spktwinduancari').combogrid('clear');
            $('#no_spktwinduancari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktwinduancari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtwinduancari(){
            var nilai1 = $('#kelompoktwinduancari').combobox('getValue');
            var nilai2 = $('#kd_regiontwinduancari').combobox('getValue');
            var nilai3 = $('#kd_cabangtwinduancari').combobox('getValue');
            var url1 = 'get_spktwinduancari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktwinduancari').combogrid('clear');
            $('#no_spktwinduancari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktwinduancari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthtwinduancari(){
            var nilai1 = $('#blthtwinduancari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoktwinduan(){
            var nilai1 = $('#kelompoktwinduan').combobox('getValue');
            var nilai2 = $('#kd_regiontwinduan').combobox('getValue');
            var nilai3 = $('#kd_cabangtwinduan').combobox('getValue');
            var url1 = 'get_spktwinduan.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktwinduan').combogrid('clear');
            $('#no_spktwinduan').combogrid('grid').datagrid('reload',url1);
            $('#no_spktwinduan').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontwinduan(){
            var nilai1 = $('#kelompoktwinduan').combobox('getValue');
            var nilai2 = $('#kd_regiontwinduan').combobox('getValue');
            var nilai3 = $('#kd_cabangtwinduan').combobox('getValue');
            var url1 = 'get_spktwinduan.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtwinduan.php?kd_region='+nilai2;
            $('#kd_cabangtwinduan').combobox('enable');
            $('#kd_cabangtwinduan').combobox('clear'); 
            $('#kd_cabangtwinduan').combobox('reload',url2);
            $('#kd_cabangtwinduan').combobox('setValue','000');
			
            $('#no_spktwinduan').combogrid('clear');
            $('#no_spktwinduan').combogrid('grid').datagrid('reload',url1);
            $('#no_spktwinduan').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtwinduan(){
            var nilai1 = $('#kelompoktwinduan').combobox('getValue');
            var nilai2 = $('#kd_regiontwinduan').combobox('getValue');
            var nilai3 = $('#kd_cabangtwinduan').combobox('getValue');
            var url1 = 'get_spktwinduan.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spktwinduan').combogrid('clear');
            $('#no_spktwinduan').combogrid('grid').datagrid('reload',url1);
            $('#no_spktwinduan').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontwinduan2(){
            var nilai1 = $('#kd_regiontwinduan2').combobox('getValue');
            var url2 = 'get_cabangtwinduan2.php?kd_region='+nilai1;
            $('#kd_cabangtwinduan2').combobox('enable');
            $('#kd_cabangtwinduan2').combobox('clear'); 
            $('#kd_cabangtwinduan2').combobox('reload',url2);
            $('#kd_cabangtwinduan2').combobox('setValue','000');
    	}
        
        function onSelectprojecttwinduan(){
            var nilai1 = $('#kd_projecttwinduan').combobox('getValue');
            var url2 = 'get_unittwinduan.php?kd_project='+nilai1;
            $('#kd_unittwinduan').combobox('enable');
            $('#kd_unittwinduan').combobox('clear'); 
            $('#kd_unittwinduan').combobox('reload',url2);
    	}
        
        function onSelectprojecttwinduan2(){
            var nilai1 = $('#kd_projecttwinduan2').combobox('getValue');
            var url2 = 'get_unittwinduan2.php?kd_project='+nilai1;
            $('#kd_unittwinduan2').combobox('enable');
            $('#kd_unittwinduan2').combobox('clear'); 
            $('#kd_unittwinduan2').combobox('reload',url2);
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

		function sliptwinduan(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niptwinduan+'|'+row.blthtwinduan+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgtwinduan").datagrid({
            onDblClickRow: function() {
                //edittwinduan();
            }
        });
    });
    </script>
    <table id="dgtwinduan" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_twinduan.php" pageSize="20"        
    		toolbar="#toolbartwinduan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
    			<th field="blthtwinduan" width="80" align="center" halign="center">BLTH</th>
    			<th field="tahuntwinduan" width="100" align="center" halign="center">Periode</th>
    			<th field="niptwinduan" width="100" align="center" halign="center">NIP</th>
    			<th field="nama_lengkaptwinduan" width="250" align="left" halign="center">Nama</th>
    			<th field="winduantwinduan" width="120" align="right" halign="center" formatter="formatrp2">Dibayarkan</th>
                <th field="bank_payrolltwinduan" width="100" align="center" halign="center">Bank</th>
                <th field="no_rek_payrolltwinduan" width="140" align="center" halign="center">Rekening</th>
                <th field="an_payrolltwinduan" width="160" align="left" halign="center">Atas Nama</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbartwinduan">
    	<div id="tbtwinduan" style="padding:3px">
            <table>
            <tr>
                <td>Tahun Realisasi</td>
                <td>
                    <input class="easyui-numberbox" id="tahuntwinduancari" name="tahuntwinduancari" value="<?=date('Y');?>" data-options="required:true,min:2018" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/Nama</td>
                <td>
                    <input class="easyui-textbox" id="niptwinduancari" name="niptwinduancari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchtwinduan()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosestwinduan()" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resettwinduan()" style="min-width:90px;">Reset</a>                    
        -->
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-cog" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-reply" style="min-width:90px;">Reset</a>                    
        <a target="_blank" href="<?=$foldernya;?>template/Templateikp.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;margin-left:10px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatetwinduan()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>

    </div>

    
    <div id="dlgtwinduan" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstwinduan">
    	<form id="fmtwinduan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Bulan Bayar</td>
                <td><input class="easyui-datebox" id="blthtwinduan" name="blthtwinduan" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Tgl Hari Raya</td>
                <td><input class="easyui-datebox" id="tgl_twinduantwinduan" name="tgl_twinduantwinduan" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Pegawai</td>
                <td><input class="easyui-numberbox" id="koefisien1twinduan" name="koefisien1twinduan" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Honorarium</td>
                <td><input class="easyui-numberbox" id="koefisien2twinduan" name="koefisien2twinduan" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstwinduan">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetwinduan()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtwinduan').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgtwinduan2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstwinduan2">
    	<form id="fmtwinduan2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Tahun</td>
                <td><input class="easyui-numberbox" id="tahuntwinduan2" name="tahuntwinduan2" data-options="required:true,min:2022" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstwinduan2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetwinduan2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtwinduan2').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    
    <div id="dlgtemplatetwinduan" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatetwinduan">
    	<form id="fmtemplatetwinduan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatetwinduan" name="file_templatetwinduan" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatetwinduan">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatetwinduan()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatetwinduan').dialog('close')" style="min-width:90px">Batal</a>
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
    	function prosestwinduan(){
            var blthnya = $("#blthtwinduancari").datebox('getValue');
    		$('#dlgtwinduan').dialog('open').dialog('setTitle','Proses Pembayaran Cuti');
    		$('#fmtwinduan').form('clear');
            $("#blthtwinduan").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_twinduan.php';
    	}
    	function savetwinduan(){
            //alert(url);
            $.messager.progress({height:75, text:'Proses twinduan'});
            $('#dlgtwinduan').dialog('close');
            $('#fmtwinduan').form('submit',{
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
                        $('#dlgtwinduan').dialog('close');
                        $('#dgtwinduan').datagrid('reload');
                    }
                }
            });
    	}
    	function resettwinduan(){
            var blthnya = $("#blthtwinduancari").datebox('getValue');
    		$('#dlgtwinduan2').dialog('open').dialog('setTitle','Reset twinduan');
    		$('#fmtwinduan2').form('clear');
            $("#blthtwinduan2").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_twinduan2.php';
    	}
    	function savetwinduan2(){
            //alert(url);
            $.messager.progress({height:75, text:'Reset twinduan'});
            $('#dlgtwinduan2').dialog('close');
            $('#fmtwinduan2').form('submit',{
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
                        $('#dlgtwinduan2').dialog('close');
                        $('#dgtwinduan').datagrid('reload');
                    }
                }
            });
    	}
        function downloadtwinduan(){
            var blthnya = $('#blthtwinduancari').datebox('getValue');
            window.open("<?=$foldernya;?>download_twinduanroll.php?blth="+blthnya,"_blank");
        }
        /*
    	function prosestwinduan2(){
            var blthnya = $("#blthtwinduancari").datebox('getValue');
    		$('#dlgtwinduan2').dialog('open').dialog('setTitle','Reset twinduanroll Kolektif');
    		$('#fmtwinduan2').form('clear');
            $("#blthtwinduan2").datebox('setValue', blthnya);
    		url2 = 'save_twinduan2.php';
    	}
    	function savetwinduan2(){
			var spknya = $('#no_spktwinduan2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset twinduanroll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset twinduanroll'});
                    $('#dlgtwinduan2').dialog('close');
            		$('#fmtwinduan2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlgtwinduan2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlgtwinduan2').dialog('close');
            					$('#dgtwinduan').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function edittwinduan(){
    		var row = $('#dgtwinduan').datagrid('getSelected');
    		if (row){
    			$('#dlgtwinduan3').dialog('open').dialog('setTitle','Proses twinduanroll Per Pegawai');
                $('#fmtwinduan3').form('clear');
    			$('#fmtwinduan3').form('load',row);            
    			url = 'save_twinduan3.php';
    		}
    	}
    	function destroytwinduan(){
    		var row = $('#dgtwinduan').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus twinduan "'+row.nama_twinduan+'"?',function(r){
    				if (r){
    					$.post('destroy_twinduan.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dgtwinduan').datagrid('reload');
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
            var rows = $('#dgtwinduan').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtwinduan);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthtwinduancari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projecttwinduancari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unittwinduancari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenistwinduancari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategoritwinduancari").combobox('getValue');
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
            var blthnya = $("#blthtwinduancari").datebox('getValue');
            var ids = [];
            var rows = $('#dgtwinduan').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtwinduan);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function gajipegawai(){
            var blthnya = $('#blthtwinduancari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function gajihonor(){
            var blthnya = $('#blthtwinduancari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function gajirekap(){
            var blthnya = $('#blthtwinduancari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        

    	function uploadtemplatetwinduan(){
    		$('#dlgtemplatetwinduan').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatetwinduan').form('clear');
    		url = '<?=$foldernya;?>save_templatetwinduan.php';
    	}
    	function savetemplatetwinduan(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatetwinduan').form('submit',{
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
    					$('#dlgtemplatetwinduan').dialog('close');
    					$('#dgtwinduan').datagrid('reload');
    				}
    			}
    		});
    	}
        
        //$("#dgtwinduan").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmtwinduan{
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
    	.fitemtwinduan{
    		margin-bottom:5px;
    	}
    	.fitemtwinduan label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemtwinduan input{
    		width:200px;
    	}
    	#fmtwinduan.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>