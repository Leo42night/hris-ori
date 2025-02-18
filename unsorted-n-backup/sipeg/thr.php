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
		function doSearchthr(){
            $('#dgthr').datagrid('load',{
				nipthrcari: $('#nipthrcari').textbox('getValue'),
				tahunthrcari: $('#tahunthrcari').numberbox('getValue'),
                jenisthrthrcari: $('#jenisthrthrcari').combobox('getValue'),
			});
		}
        
        function onSelectkelompokthrcari(){
            var nilai1 = $('#kelompokthrcari').combobox('getValue');
            var nilai2 = $('#kd_regionthrcari').combobox('getValue');
            var nilai3 = $('#kd_cabangthrcari').combobox('getValue');
            var url1 = 'get_spkthrcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkthrcari').combogrid('clear');
            $('#no_spkthrcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkthrcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionthrcari(){
            var nilai1 = $('#kelompokthrcari').combobox('getValue');
            var nilai2 = $('#kd_regionthrcari').combobox('getValue');
            var nilai3 = $('#kd_cabangthrcari').combobox('getValue');
            var url1 = 'get_spkthrcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangthrcari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangthrcari').combobox('enable');
            $('#kd_cabangthrcari').combobox('clear'); 
            $('#kd_cabangthrcari').combobox('reload',url2);
            $('#kd_cabangthrcari').combobox('setValue','000');

            $('#no_spkthrcari').combogrid('clear');
            $('#no_spkthrcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkthrcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangthrcari(){
            var nilai1 = $('#kelompokthrcari').combobox('getValue');
            var nilai2 = $('#kd_regionthrcari').combobox('getValue');
            var nilai3 = $('#kd_cabangthrcari').combobox('getValue');
            var url1 = 'get_spkthrcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkthrcari').combogrid('clear');
            $('#no_spkthrcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkthrcari').combogrid('setValue','SEMUA');
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
        
        function onSelectblththrcari(){
            var nilai1 = $('#blththrcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompokthr(){
            var nilai1 = $('#kelompokthr').combobox('getValue');
            var nilai2 = $('#kd_regionthr').combobox('getValue');
            var nilai3 = $('#kd_cabangthr').combobox('getValue');
            var url1 = 'get_spkthr.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkthr').combogrid('clear');
            $('#no_spkthr').combogrid('grid').datagrid('reload',url1);
            $('#no_spkthr').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionthr(){
            var nilai1 = $('#kelompokthr').combobox('getValue');
            var nilai2 = $('#kd_regionthr').combobox('getValue');
            var nilai3 = $('#kd_cabangthr').combobox('getValue');
            var url1 = 'get_spkthr.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangthr.php?kd_region='+nilai2;
            $('#kd_cabangthr').combobox('enable');
            $('#kd_cabangthr').combobox('clear'); 
            $('#kd_cabangthr').combobox('reload',url2);
            $('#kd_cabangthr').combobox('setValue','000');
			
            $('#no_spkthr').combogrid('clear');
            $('#no_spkthr').combogrid('grid').datagrid('reload',url1);
            $('#no_spkthr').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangthr(){
            var nilai1 = $('#kelompokthr').combobox('getValue');
            var nilai2 = $('#kd_regionthr').combobox('getValue');
            var nilai3 = $('#kd_cabangthr').combobox('getValue');
            var url1 = 'get_spkthr.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spkthr').combogrid('clear');
            $('#no_spkthr').combogrid('grid').datagrid('reload',url1);
            $('#no_spkthr').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionthr2(){
            var nilai1 = $('#kd_regionthr2').combobox('getValue');
            var url2 = 'get_cabangthr2.php?kd_region='+nilai1;
            $('#kd_cabangthr2').combobox('enable');
            $('#kd_cabangthr2').combobox('clear'); 
            $('#kd_cabangthr2').combobox('reload',url2);
            $('#kd_cabangthr2').combobox('setValue','000');
    	}
        
        function onSelectprojectthr(){
            var nilai1 = $('#kd_projectthr').combobox('getValue');
            var url2 = 'get_unitthr.php?kd_project='+nilai1;
            $('#kd_unitthr').combobox('enable');
            $('#kd_unitthr').combobox('clear'); 
            $('#kd_unitthr').combobox('reload',url2);
    	}
        
        function onSelectprojectthr2(){
            var nilai1 = $('#kd_projectthr2').combobox('getValue');
            var url2 = 'get_unitthr2.php?kd_project='+nilai1;
            $('#kd_unitthr2').combobox('enable');
            $('#kd_unitthr2').combobox('clear'); 
            $('#kd_unitthr2').combobox('reload',url2);
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

		function slipthr(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.nipthr+'|'+row.blththr+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgthr").datagrid({
            onDblClickRow: function() {
                //editthr();
            }
        });
    });
    </script>
    <table id="dgthr" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_thr.php" pageSize="20"        
    		toolbar="#toolbarthr" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
    			<th field="blththr" width="80" align="center" halign="center">BLTH</th>
    			<th field="nipthr" width="100" align="center" halign="center">NIP</th>
    			<th field="nama_lengkapthr" width="200" align="left" halign="center">Nama</th>
                <th field="nama_jenisthrthr" width="140" align="center" halign="center">Jenis THR</th>
                <th field="agama2thr" width="140" align="center" halign="center">Agama</th>
    			<th field="koefisienthr" width="100" align="center" halign="center" formatter="formatrp2">Koef</th>
    			<th field="p1thr" width="100" align="right" halign="center" formatter="formatrp2">P1</th>
    			<th field="thrthr" width="100" align="right" halign="center" formatter="formatrp2">THR</th>
                <th field="blth_awalthr" width="100" align="center" halign="center">Bulan Awal</th>
                <th field="blth_akhirthr" width="100" align="center" halign="center">Bulan Akhir</th>
                <th field="jumlah_bulanthr" width="100" align="center" halign="center">Jumlah Bulan</th>
                <th field="bank_payrollthr" width="100" align="center" halign="center">Bank</th>
                <th field="no_rek_payrollthr" width="140" align="center" halign="center">Rekening</th>
                <th field="an_payrollthr" width="160" align="left" halign="center">Atas Nama</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbarthr">
    	<div id="tbthr" style="padding:3px">
            <table>
            <tr>
                <td>TAHUN</td>
                <td>
                    <input class="easyui-numberbox" id="tahunthrcari" name="tahunthrcari" value="<?=date('Y');?>" data-options="required:true,min:2018" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>JENIS THR</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenisthrthrcari"  editable="false" 
                        name="jenisthrthrcari" value="0"
                        style="padding: 2px; width: 160px;" 
                        data-options="
                            url:'<?=$foldernya;?>get_jenis_thrcari.php',
                            required:true,
                            prompt:'',
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipthrcari" name="nipthrcari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchthr()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosesthr()" style="min-width:90px;">Proses THR</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resetthr()" style="min-width:90px;">Reset THR</a>                    
        <a target="_blank" href="<?=$foldernya;?>template/TemplateTHR.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;margin-left:10px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatethr()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>

    </div>

    
    <div id="dlgthr" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonsthr">
    	<form id="fmthr" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Bulan Bayar</td>
                <td><input class="easyui-datebox" id="blththr" name="blththr" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Tgl Hari Raya</td>
                <td><input class="easyui-datebox" id="tgl_thrthr" name="tgl_thrthr" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>Jenis THR</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenisthrthr"  editable="false" 
                        name="jenisthrthr" value=""
                        style="padding: 2px; width: 200px;" 
                        data-options="
                            url:'<?=$foldernya;?>get_jenis_thr.php',
                            required:true,
                            prompt:'',
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Pegawai</td>
                <td><input class="easyui-numberbox" id="koefisien1thr" name="koefisien1thr" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Koef.Honorarium</td>
                <td><input class="easyui-numberbox" id="koefisien2thr" name="koefisien2thr" data-options="required:true,min:1,precision:1,groupSeparator:',',decimalSeparator:'.'" style="width: 100px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsthr">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savethr()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgthr').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgthr2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonsthr2">
    	<form id="fmthr2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Tahun</td>
                <td><input class="easyui-numberbox" id="tahunthr2" name="tahunthr2" data-options="required:true,min:2022" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>Jenis THR</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenisthrthr2" editable="false"
                        name="jenisthrthr2" value=""
                        style="padding: 2px; width: 200px;" 
                        data-options="
                            url:'<?=$foldernya;?>get_jenis_thr.php',
                            required:true,
                            prompt:'',
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsthr2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savethr2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgthr2').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    
    <div id="dlgtemplatethr" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatethr">
    	<form id="fmtemplatethr" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatethr" name="file_templatethr" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatethr">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatethr()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatethr').dialog('close')" style="min-width:90px">Batal</a>
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
    	function prosesthr(){
            //var blthnya = $("#blththrcari").datebox('getValue');
            var jenisthrnya = $("#jenisthrthrcari").combobox('getValue');
    		$('#dlgthr').dialog('open').dialog('setTitle','Proses THR');
    		$('#fmthr').form('clear');
            $("#blththr").datebox('setValue', "<?=date('Y-m');?>");
            if(jenisthrnya!="0"){
                $("#jenisthrthr").combobox('setValue', jenisthrnya);
            }
    		url = '<?=$foldernya;?>save_thr.php';
    	}
    	function savethr(){
            //alert(url);
            $.messager.progress({height:75, text:'Proses THR'});
            $('#dlgthr').dialog('close');
            $('#fmthr').form('submit',{
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
                        $('#dlgthr').dialog('close');
                        $('#dgthr').datagrid('reload');
                    }
                }
            });
    	}
    	function resetthr(){
            var tahunnya = $("#tahunthrcari").numberbox('getValue');
            var jenisthrnya = $("#jenisthrthrcari").combobox('getValue');
    		$('#dlgthr2').dialog('open').dialog('setTitle','Reset THR');
    		$('#fmthr2').form('clear');
            $("#tahunthr2").numberbox('setValue', tahunnya);
            if(jenisthrnya!="0"){
                $("#jenisthrthr2").combobox('setValue', jenisthrnya);
            }
    		url = '<?=$foldernya;?>save_thr2.php';
    	}
    	function savethr2(){
            //alert(url);
            $.messager.progress({height:75, text:'Reset THR'});
            $('#dlgthr2').dialog('close');
            $('#fmthr2').form('submit',{
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
                        $('#dlgthr2').dialog('close');
                        $('#dgthr').datagrid('reload');
                    }
                }
            });
    	}
        function downloadthr(){
            var blthnya = $('#blththrcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_thrroll.php?blth="+blthnya,"_blank");
        }
        /*
    	function prosesthr2(){
            var blthnya = $("#blththrcari").datebox('getValue');
    		$('#dlgthr2').dialog('open').dialog('setTitle','Reset thrroll Kolektif');
    		$('#fmthr2').form('clear');
            $("#blththr2").datebox('setValue', blthnya);
    		url2 = 'save_thr2.php';
    	}
    	function savethr2(){
			var spknya = $('#no_spkthr2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset thrroll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset thrroll'});
                    $('#dlgthr2').dialog('close');
            		$('#fmthr2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlgthr2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlgthr2').dialog('close');
            					$('#dgthr').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editthr(){
    		var row = $('#dgthr').datagrid('getSelected');
    		if (row){
    			$('#dlgthr3').dialog('open').dialog('setTitle','Proses thrroll Per Pegawai');
                $('#fmthr3').form('clear');
    			$('#fmthr3').form('load',row);            
    			url = 'save_thr3.php';
    		}
    	}
    	function destroythr(){
    		var row = $('#dgthr').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus thr "'+row.nama_thr+'"?',function(r){
    				if (r){
    					$.post('destroy_thr.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dgthr').datagrid('reload');
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
            var rows = $('#dgthr').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idthr);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blththrcari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectthrcari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitthrcari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenisthrcari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategorithrcari").combobox('getValue');
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
            var blthnya = $("#blththrcari").datebox('getValue');
            var ids = [];
            var rows = $('#dgthr').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idthr);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function gajipegawai(){
            var blthnya = $('#blththrcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function gajihonor(){
            var blthnya = $('#blththrcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function gajirekap(){
            var blthnya = $('#blththrcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        

    	function uploadtemplatethr(){
    		$('#dlgtemplatethr').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatethr').form('clear');
    		url = '<?=$foldernya;?>save_templatethr.php';
    	}
    	function savetemplatethr(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatethr').form('submit',{
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
    					$('#dlgtemplatethr').dialog('close');
    					$('#dgthr').datagrid('reload');
    				}
    			}
    		});
    	}
        
        //$("#dgthr").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmthr{
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
    	.fitemthr{
    		margin-bottom:5px;
    	}
    	.fitemthr label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemthr input{
    		width:200px;
    	}
    	#fmthr.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>