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
		function doSearchtiks(){
            $('#dgtiks').datagrid('load',{
				niptikscari: $('#niptikscari').textbox('getValue'),
				tahuntikscari: $('#tahuntikscari').numberbox('getValue'),
                semestertikscari: $('#semestertikscari').combobox('getValue'),
			});
		}
        
        function onSelectkelompoktikscari(){
            var nilai1 = $('#kelompoktikscari').combobox('getValue');
            var nilai2 = $('#kd_regiontikscari').combobox('getValue');
            var nilai3 = $('#kd_cabangtikscari').combobox('getValue');
            var url1 = 'get_spktikscari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktikscari').combogrid('clear');
            $('#no_spktikscari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikscari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontikscari(){
            var nilai1 = $('#kelompoktikscari').combobox('getValue');
            var nilai2 = $('#kd_regiontikscari').combobox('getValue');
            var nilai3 = $('#kd_cabangtikscari').combobox('getValue');
            var url1 = 'get_spktikscari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtikscari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangtikscari').combobox('enable');
            $('#kd_cabangtikscari').combobox('clear'); 
            $('#kd_cabangtikscari').combobox('reload',url2);
            $('#kd_cabangtikscari').combobox('setValue','000');

            $('#no_spktikscari').combogrid('clear');
            $('#no_spktikscari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikscari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtikscari(){
            var nilai1 = $('#kelompoktikscari').combobox('getValue');
            var nilai2 = $('#kd_regiontikscari').combobox('getValue');
            var nilai3 = $('#kd_cabangtikscari').combobox('getValue');
            var url1 = 'get_spktikscari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktikscari').combogrid('clear');
            $('#no_spktikscari').combogrid('grid').datagrid('reload',url1);
            $('#no_spktikscari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthtikscari(){
            var nilai1 = $('#blthtikscari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoktiks(){
            var nilai1 = $('#kelompoktiks').combobox('getValue');
            var nilai2 = $('#kd_regiontiks').combobox('getValue');
            var nilai3 = $('#kd_cabangtiks').combobox('getValue');
            var url1 = 'get_spktiks.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spktiks').combogrid('clear');
            $('#no_spktiks').combogrid('grid').datagrid('reload',url1);
            $('#no_spktiks').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontiks(){
            var nilai1 = $('#kelompoktiks').combobox('getValue');
            var nilai2 = $('#kd_regiontiks').combobox('getValue');
            var nilai3 = $('#kd_cabangtiks').combobox('getValue');
            var url1 = 'get_spktiks.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangtiks.php?kd_region='+nilai2;
            $('#kd_cabangtiks').combobox('enable');
            $('#kd_cabangtiks').combobox('clear'); 
            $('#kd_cabangtiks').combobox('reload',url2);
            $('#kd_cabangtiks').combobox('setValue','000');
			
            $('#no_spktiks').combogrid('clear');
            $('#no_spktiks').combogrid('grid').datagrid('reload',url1);
            $('#no_spktiks').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangtiks(){
            var nilai1 = $('#kelompoktiks').combobox('getValue');
            var nilai2 = $('#kd_regiontiks').combobox('getValue');
            var nilai3 = $('#kd_cabangtiks').combobox('getValue');
            var url1 = 'get_spktiks.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spktiks').combogrid('clear');
            $('#no_spktiks').combogrid('grid').datagrid('reload',url1);
            $('#no_spktiks').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiontiks2(){
            var nilai1 = $('#kd_regiontiks2').combobox('getValue');
            var url2 = 'get_cabangtiks2.php?kd_region='+nilai1;
            $('#kd_cabangtiks2').combobox('enable');
            $('#kd_cabangtiks2').combobox('clear'); 
            $('#kd_cabangtiks2').combobox('reload',url2);
            $('#kd_cabangtiks2').combobox('setValue','000');
    	}
        
        function onSelectprojecttiks(){
            var nilai1 = $('#kd_projecttiks').combobox('getValue');
            var url2 = 'get_unittiks.php?kd_project='+nilai1;
            $('#kd_unittiks').combobox('enable');
            $('#kd_unittiks').combobox('clear'); 
            $('#kd_unittiks').combobox('reload',url2);
    	}
        
        function onSelectprojecttiks2(){
            var nilai1 = $('#kd_projecttiks2').combobox('getValue');
            var url2 = 'get_unittiks2.php?kd_project='+nilai1;
            $('#kd_unittiks2').combobox('enable');
            $('#kd_unittiks2').combobox('clear'); 
            $('#kd_unittiks2').combobox('reload',url2);
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

		function sliptiks(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niptiks+'|'+row.blthtiks+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgtiks").datagrid({
            onDblClickRow: function() {
                //edittiks();
            }
        });
    });
    </script>
    <table id="dgtiks" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_tiks.php" pageSize="20"        
    		toolbar="#toolbartiks" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
    			<th field="blthtiks" width="80" align="center" halign="center">BLTH</th>
    			<th field="tahuntiks" width="100" align="center" halign="center">Periode</th>
    			<th field="semester2tiks" width="100" align="center" halign="center">Periode</th>
    			<th field="niptiks" width="100" align="center" halign="center">NIP</th>
    			<th field="nama_lengkaptiks" width="250" align="left" halign="center">Nama</th>
    			<th field="p31tiks" width="120" align="right" halign="center" formatter="formatrp2">Dibayarkan</th>
                <th field="bank_payrolltiks" width="100" align="center" halign="center">Bank</th>
                <th field="no_rek_payrolltiks" width="140" align="center" halign="center">Rekening</th>
                <th field="an_payrolltiks" width="220" align="left" halign="center">Atas Nama</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbartiks">
    	<div id="tbtiks" style="padding:3px">
            <table>
            <tr>
                <td>Tahun Realisasi</td>
                <td>
                    <input class="easyui-numberbox" id="tahuntikscari" name="tahuntikscari" value="<?=date('Y');?>" data-options="required:true,min:2018" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>Semester</td>
                <td>
                    <select id="semestertikscari" name="semestertikscari" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 140px;">
                       <option value="0" selected>Semua</option>
                       <option value="1">Semester I</option>
                       <option value="2">Semester II</option>
                    </select>                            
                </td>
                <td>&nbsp;</td>
                <td>NIP/Nama</td>
                <td>
                    <input class="easyui-textbox" id="niptikscari" name="niptikscari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchtiks()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosestiks()" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resettiks()" style="min-width:90px;">Reset</a>                    
        -->
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-cog" style="min-width:90px;">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-reply" style="min-width:90px;">Reset</a>                    
        <a target="_blank" href="<?=$foldernya;?>template/Templateiks.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;margin-left:10px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatetiks()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>

    </div>

    
    <div id="dlgtiks" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstiks">
    	<form id="fmtiks" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Bulan Bayar</td>
                <td><input class="easyui-datebox" id="blthtiks" name="blthtiks" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Tgl Hari Raya</td>
                <td><input class="easyui-datebox" id="tgl_tikstiks" name="tgl_tikstiks" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Pegawai</td>
                <td><input class="easyui-numberbox" id="koefisien1tiks" name="koefisien1tiks" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Honorarium</td>
                <td><input class="easyui-numberbox" id="koefisien2tiks" name="koefisien2tiks" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstiks">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetiks()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtiks').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgtiks2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonstiks2">
    	<form id="fmtiks2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Tahun</td>
                <td><input class="easyui-numberbox" id="tahuntiks2" name="tahuntiks2" data-options="required:true,min:2022" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstiks2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savetiks2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtiks2').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    
    <div id="dlgtemplatetiks" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatetiks">
    	<form id="fmtemplatetiks" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatetiks" name="file_templatetiks" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatetiks">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatetiks()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatetiks').dialog('close')" style="min-width:90px">Batal</a>
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
    	function prosestiks(){
            var blthnya = $("#blthtikscari").datebox('getValue');
    		$('#dlgtiks').dialog('open').dialog('setTitle','Proses Pembayaran Cuti');
    		$('#fmtiks').form('clear');
            $("#blthtiks").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_tiks.php';
    	}
    	function savetiks(){
            //alert(url);
            $.messager.progress({height:75, text:'Proses tiks'});
            $('#dlgtiks').dialog('close');
            $('#fmtiks').form('submit',{
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
                        $('#dlgtiks').dialog('close');
                        $('#dgtiks').datagrid('reload');
                    }
                }
            });
    	}
    	function resettiks(){
            var blthnya = $("#blthtikscari").datebox('getValue');
    		$('#dlgtiks2').dialog('open').dialog('setTitle','Reset tiks');
    		$('#fmtiks2').form('clear');
            $("#blthtiks2").datebox('setValue', blthnya);
    		url = '<?=$foldernya;?>save_tiks2.php';
    	}
    	function savetiks2(){
            //alert(url);
            $.messager.progress({height:75, text:'Reset tiks'});
            $('#dlgtiks2').dialog('close');
            $('#fmtiks2').form('submit',{
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
                        $('#dlgtiks2').dialog('close');
                        $('#dgtiks').datagrid('reload');
                    }
                }
            });
    	}
        function downloadtiks(){
            var blthnya = $('#blthtikscari').datebox('getValue');
            window.open("<?=$foldernya;?>download_tiksroll.php?blth="+blthnya,"_blank");
        }
        /*
    	function prosestiks2(){
            var blthnya = $("#blthtikscari").datebox('getValue');
    		$('#dlgtiks2').dialog('open').dialog('setTitle','Reset tiksroll Kolektif');
    		$('#fmtiks2').form('clear');
            $("#blthtiks2").datebox('setValue', blthnya);
    		url2 = 'save_tiks2.php';
    	}
    	function savetiks2(){
			var spknya = $('#no_spktiks2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset tiksroll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset tiksroll'});
                    $('#dlgtiks2').dialog('close');
            		$('#fmtiks2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlgtiks2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlgtiks2').dialog('close');
            					$('#dgtiks').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function edittiks(){
    		var row = $('#dgtiks').datagrid('getSelected');
    		if (row){
    			$('#dlgtiks3').dialog('open').dialog('setTitle','Proses tiksroll Per Pegawai');
                $('#fmtiks3').form('clear');
    			$('#fmtiks3').form('load',row);            
    			url = 'save_tiks3.php';
    		}
    	}
    	function destroytiks(){
    		var row = $('#dgtiks').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus tiks "'+row.nama_tiks+'"?',function(r){
    				if (r){
    					$.post('destroy_tiks.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dgtiks').datagrid('reload');
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
            var rows = $('#dgtiks').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtiks);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthtikscari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projecttikscari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unittikscari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenistikscari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategoritikscari").combobox('getValue');
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
            var blthnya = $("#blthtikscari").datebox('getValue');
            var ids = [];
            var rows = $('#dgtiks').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idtiks);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function gajipegawai(){
            var blthnya = $('#blthtikscari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function gajihonor(){
            var blthnya = $('#blthtikscari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function gajirekap(){
            var blthnya = $('#blthtikscari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        

    	function uploadtemplatetiks(){
    		$('#dlgtemplatetiks').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatetiks').form('clear');
    		url = '<?=$foldernya;?>save_templatetiks.php';
    	}
    	function savetemplatetiks(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatetiks').form('submit',{
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
    					$('#dlgtemplatetiks').dialog('close');
    					$('#dgtiks').datagrid('reload');
    				}
    			}
    		});
    	}
        
        //$("#dgtiks").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmtiks{
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
    	.fitemtiks{
    		margin-bottom:5px;
    	}
    	.fitemtiks label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemtiks input{
    		width:200px;
    	}
    	#fmtiks.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>