<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/pajak/";
    ?>
    <script type="text/javascript">                     
		function doSearchsptmanual(){
            /*
            var blth = $('#blthsptmanualcari').datebox('getValue');
            var kpp = $('#kppsptmanualcari').combobox('getValue');
            var nip = $('#nipsptmanualcari').textbox('getValue');
            alert(blth+" "+kpp+" "+nip);
            */
            $('#dgsptmanual').datagrid('load',{
				blthsptmanualcari: $('#blthsptmanualcari').datebox('getValue'),
				kppsptmanualcari: $('#kppsptmanualcari').combobox('getValue'),
				nipsptmanualcari: $('#nipsptmanualcari').textbox('getValue')
			});
		}
        
        function onSelectregionsptmanualcari(){
            var nilai1 = $('#kd_regionsptmanualcari').combobox('getValue');
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai1;
            $('#kd_cabangsptmanualcari').combobox('enable');
            $('#kd_cabangsptmanualcari').combobox('clear'); 
            $('#kd_cabangsptmanualcari').combobox('reload',url2);
            $('#kd_cabangsptmanualcari').combobox('setValue','000');
            
            $('#kd_unitsptmanualcari').combobox('enable');
            $('#kd_unitsptmanualcari').combobox('clear'); 
            $('#kd_unitsptmanualcari').combobox('reload',url3);
            $('#kd_unitsptmanualcari').combobox('setValue','semua');
    	}
        
        function onSelectcabangsptmanualcari(){
            var nilai1 = $('#kd_regionsptmanualcari').combobox('getValue');
            var nilai2 = $('#kd_cabangsptmanualcari').combobox('getValue');
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2;
            $('#kd_unitsptmanualcari').combobox('enable');
            $('#kd_unitsptmanualcari').combobox('clear'); 
            $('#kd_unitsptmanualcari').combobox('reload',url2);
            $('#kd_unitsptmanualcari').combobox('setValue','semua');
    	}
        
        function onSelectkelompoksptmanual(){
            var nilai1 = $('#kelompoksptmanual').combobox('getValue');
            var url3 = 'get_sptmanual2.php[not_found]?kelompok='+nilai1;
            $('#no_spksptmanual').combogrid('clear');
            $('#no_spksptmanual').combogrid('grid').datagrid('reload',url3);
            $('#no_spksptmanual').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsptmanual(){
            var nilai1 = $('#kd_regionsptmanual').combobox('getValue');
            var nilai2 = $('#kelompoksptmanual').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_sptmanual2.php[not_found]?kd_region='+nilai1+'&kelompok='+nilai2;
            $('#kd_cabangsptmanual').combobox('enable');
            $('#kd_cabangsptmanual').combobox('clear'); 
            $('#kd_cabangsptmanual').combobox('reload',url2);
            $('#kd_cabangsptmanual').combobox('setValue','000');
            
            $('#no_spksptmanual').combogrid('clear');
            $('#no_spksptmanual').combogrid('grid').datagrid('reload',url2);
            $('#no_spksptmanual').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangsptmanual(){
            var nilai1 = $('#kd_regionsptmanual').combobox('getValue');
            var nilai2 = $('#kd_cabangsptmanual').combobox('getValue');
            var nilai3 = $('#kelompoksptmanual').combobox('getValue');
            var url2 = 'get_spk2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2+'&kelompok='+nilai3;
            $('#no_spksptmanual').combogrid('clear');
            $('#no_spksptmanual').combogrid('grid').datagrid('reload',url2);
            $('#no_spksptmanual').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsptmanual2(){
            var nilai1 = $('#kd_regionsptmanual2').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_unit2.php[not_found]?kd_region='+nilai1;
            $('#kd_cabangsptmanual2').combobox('enable');
            $('#kd_cabangsptmanual2').combobox('clear'); 
            $('#kd_cabangsptmanual2').combobox('reload',url2);
            $('#kd_cabangsptmanual2').combobox('setValue','000');
            
            $('#kd_unitsptmanual2').combobox('enable');
            $('#kd_unitsptmanual2').combobox('clear'); 
            $('#kd_unitsptmanual2').combobox('reload',url3);
            $('#kd_unitsptmanual2').combobox('setValue','semua');
    	}
        
        function onSelectcabangsptmanual2(){
            var nilai1 = $('#kd_regionsptmanual2').combobox('getValue');
            var nilai2 = $('#kd_cabangsptmanual2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2;
            $('#kd_unitsptmanual2').combobox('enable');
            $('#kd_unitsptmanual2').combobox('clear'); 
            $('#kd_unitsptmanual2').combobox('reload',url2);
            $('#kd_unitsptmanual2').combobox('setValue','semua');
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
        
        function onSelectblthsptmanualcari(){
            var nilai1 = $('#blthsptmanualcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectprojectsptmanual(){
            var nilai1 = $('#kd_projectsptmanual').combobox('getValue');
            var url2 = 'get_unit.php?kd_project='+nilai1;
            $('#kd_unitsptmanual').combobox('enable');
            $('#kd_unitsptmanual').combobox('clear'); 
            $('#kd_unitsptmanual').combobox('reload',url2);
    	}
        
        function onSelectprojectsptmanual2(){
            var nilai1 = $('#kd_projectsptmanual2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_project='+nilai1;
            $('#kd_unitsptmanual2').combobox('enable');
            $('#kd_unitsptmanual2').combobox('clear'); 
            $('#kd_unitsptmanual2').combobox('reload',url2);
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
                return number_format2(val,3,',','.');
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
		function formsptmanual(value,row,index){
            // var by2 = '<a href="javascript:void(0)" onclick="cetakform(\''+row.nipsptmanual+'|'+row.blthsptmanual+'\')" title="Form 1721-A1"><i class="fas fa-print fa-2x purple"></i></a>';
            var a = '<a href="javascript:void(0)" title="Cetak Form1721A1" onclick="cetakform(\''+row.idsptmanual+'|'+row.blthsptmanual+'\')"><button class="easyui-linkbutton c1" style="min-width:60px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;">1721A1</button></a>';
            return a;
		}
    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgsptmanual").datagrid({
            onDblClickRow: function() {
                //editsptmanual();
            }
        });
        /*
        var today = new Date();
        var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
        var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();
        var dateTime = date+' '+time;            
        var namafilenya = "daftar sptmanual "+dateTime+".xlsx";
        $('#namafiledownload').val(namafilenya);
        */        
    });
    </script>
    <table id="dgsptmanual" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_sptmanual.php" pageSize="20"        
    		toolbar="#toolbarsptmanual" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="ck" checkbox="true"></th>
                <th rowspan="2" field="formsptmanual" width="80" align="center" halign="center" data-options="formatter:formsptmanual">Form<br/>1721A1</th>
    			<th rowspan="2" field="nipsptmanual" width="140" sortable="true" align="center" halign="center">No Induk</th>
    			<th rowspan="2" field="namasptmanual" width="140" sortable="true" align="left" halign="center">Nama Pegawai</th>
    			<th rowspan="2" field="jabatansptmanual" width="200" sortable="true" align="left" halign="center">Jabatan</th>
    			<th rowspan="2" field="statussptmanual" width="80" sortable="true" align="center" halign="center">Status</th>
    			<th rowspan="2" field="npwpsptmanual" width="160" sortable="true" align="center" halign="center">NPWP</th>
    			<th rowspan="2" field="no_urutsptmanual" width="80" sortable="true" align="center" halign="center">No Urut</th>
    			<th rowspan="2" field="blthsptmanual" width="70" sortable="true" align="center" halign="center">Bulan<br />Pajak</th>
    			<th rowspan="2" field="blth_awalsptmanual" width="70" sortable="true" align="center" halign="center">BLTH<br/>Awal</th>
    			<th rowspan="2" field="blth_akhirsptmanual" width="70" sortable="true" align="center" halign="center">BLTH<br/>Akhir</th>
    			<th rowspan="2" field="masa_kerjasptmanual" width="60" sortable="true" align="center" halign="center">Jumlah<br/>Bulan</th>
    			<th rowspan="2" field="gajisptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Gaji</th>
    			<th rowspan="2" field="tunjangan_pphsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />PPh</th>
    			<th rowspan="2" field="tunjangan_variablesptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />Lainnya</th>
    			<th rowspan="2" field="honorariumsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Honorarium</th>
    			<th rowspan="2" field="benefitsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Benefit</th>
    			<th rowspan="2" field="natunasptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Natura</th>
                <th rowspan="2" field="beban_pph21sptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Beban PPh</th>
                <th colspan="3"><span style="font-weight:bold;">Rutin (Bulan)</span></th>
                <th colspan="5"><span style="font-weight:bold;">Rutin (Disetahunkan)</span></th>
    			<th rowspan="2" field="bonus_thrsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Non Rutin</th>
    			<th rowspan="2" field="nettot_sebelumnyasptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto Masa<br />Sebelumnya</th>
    			<th rowspan="2" field="nettot_akhirsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br />Untuk PKP</th>
    			<th rowspan="2" field="ptkpsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PTKP</th>
    			<th rowspan="2" field="pkpsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PKP</th>
    			<th rowspan="2" field="pphtsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh<br />Setahun</th>
    			<th rowspan="2" field="ppht_sebelumnyasptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Sudah<br />Dipotong</th>
    			<th rowspan="2" field="ppht_terutangsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Terutang<br />Setahun</th>
                <th rowspan="2" field="pphb_terutangsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Terutang<br />Bulan Ini</th>
            </tr>
            <tr>
    			<th field="brutobsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatanbsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiunbsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>

    			<th field="brutotsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatantsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiuntsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>
    			<th field="biaya_pengurangtsptmanual" width="110" sortable="true" align="right" halign="center" formatter="formatrp2">B.Pengurang<br/>(4)</th>
    			<th field="nettotsptmanual" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br/>(5)</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarsptmanual">
    	<div id="tbsptmanual" style="padding:3px">
            <table>
            <tr>
                <td>BULAN</td>
                <td colspan="6">
                    <input class="easyui-datebox" id="blthsptmanualcari" name="blthsptmanualcari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>KPP</td>
                <td>
                    <input class="easyui-combobox"
                        id="kppsptmanualcari" editable="false"
                        name="kppsptmanualcari" value="SEMUA"
                        style="padding: 2px; width: 140px;" 
                        data-options="
                            url:'<?=$foldernya;?>get_kppcari.php',
                            required:false,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
                <td>&nbsp;</td>
                <td>NAMA/NIP</td>
                <td>
                    <input class="easyui-textbox" id="nipsptmanualcari" name="nipsptmanualcari" data-options="required:false,prompt:''" style="width: 200px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchsptmanual()" style="min-width:90px;">Search</a>                    
                    <!-- <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-cog" plain="false" onclick="prosessptmanual()" style="min-width:90px;">Proses sptmanual</a> -->
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file" plain="false" onclick="uploadcsv()" style="min-width:90px;">Upload CSV</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" plain="false" onclick="resetsptmanual()" style="min-width:90px;">Reset SPT Manual</a>
                </td>
            </tr>
            </table>
            <table>
            <!-- <tr>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-cog" plain="false" onclick="prosessptmanual()" style="min-width:90px;">Proses sptmanual Masa</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" plain="false" onclick="resetsptmanual()" style="min-width:90px;">Reset sptmanual Masa</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csv1721i()" style="min-width:90px;">1721-I CSV</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" plain="false" onclick="downloadsptmanual()" style="min-width:90px;">Download sptmanual Masa</a></td>                
            </tr> -->
            <tr>
                <td><a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-print" onclick="cetakform2()" style="min-width:90px;">Form 1721-A1 Kolektif</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csvpph()" style="min-width:90px;">1721-A1 CSV</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csv1721i()" style="min-width:90px;">1721-I CSV</a></td>
                <td><a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-print" onclick="lapsptmanual()" style="min-width:90px;">Rekapitulasi Pajak Tahunan</a></td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgsptmanual" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmanual">
    	<form id="fmsptmanual" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmanual" name="blthsptmanual" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipsptmanual" name="nipsptmanual" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmanual">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savesptmanual()" style="min-width:90px">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsptmanual').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsptmanual2" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmanual2">
    	<form id="fmsptmanual2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmanual2" name="blthsptmanual2" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipsptmanual2" name="nipsptmanual2" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmanual2">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-reply" onclick="savesptmanual2()" style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsptmanual2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsptmanual3" class="easyui-dialog" modal="true" style="min-width:280px;min-height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmanual3">
    	<form id="fmsptmanual3" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmanual3" name="blthsptmanual3" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipsptmanual3" name="nipsptmanual3" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmanual3">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savesptmanual3()" style="width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgsptmanual3').dialog('close')" style="width:90px">Batal</a>
    </div>
    
    <div id="dlgsptmanual4" class="easyui-dialog" modal="true" style="width:280px;height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmanual4">
    	<form id="fmsptmanual4" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmanual4" name="blthsptmanual4" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipsptmanual4" name="nipsptmanual4" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmanual4">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savesptmanual4()" style="width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgsptmanual4').dialog('close')" style="width:90px">Batal</a>
    </div>
    
    <div id="dlgform" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true" buttons="">
        <iframe id="panelform" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>
    
    <div id="dlgform2" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true" buttons="">
        <iframe id="panelform2" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>
    
    <div id="dlglist" class="easyui-dialog" modal="true" style="width:1200px;height:600px;padding:0px;" closed="true" buttons="">
        <iframe id="panellist" src="#" style="width: 100%; height: 550px; border: none;"></iframe>
    </div>
    
    <div id="dlgcsv" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonscsv">
    	<form id="fmcsv" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Upload</td>                    
                    <td>
            			<input class="easyui-filebox" id="filecsv" name="filecsv" buttonAlign="left" buttonText="Upload csv" editable="false" data-options="required:true,prompt:'Format file csv...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonscsv">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savecsv()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgcsv').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="p" style="width:400px;"></div>
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
        
    	function downloadsptmanual(){  
            /*
            var kelompoknya = $('#kelompoksptmanualcari').combobox('getValue');
            var kd_regionnya = $('#kd_regionsptmanualcari').combobox('getValue');
            var kd_cabangnya = $('#kd_cabangsptmanualcari').combobox('getValue');
            var kd_unitnya = $('#kd_unitsptmanualcari').combobox('getValue');
            var nipnya = $('#nipsptmanualcari').textbox('getValue');
            var blthnya = $('#blthsptmanualcari').datebox('getValue');
            var namafiledownload = $('#namafiledownload').val();

            //window.open("download_sptmanual.php[not_found]?kelompok="+kelompoknya+"&region="+kd_regionnya+"&cabang="+kd_cabangnya+"&unit="+kd_unitnya+"&nip="+nipnya+"&blth="+blthnya,"_blank");
            
            $(".box").html("");
            myStartFunctionsptmanual();
            $.post('download_sptmanual.php[not_found]',{kelompok:kelompoknya,region:kd_regionnya,cabang:kd_cabangnya,unit:kd_unitnya,nip:nipnya,blth:blthnya,namafile:namafiledownload},function(result){
                if (result.success){
                } else {
                }
            },'json');  
            */
            var blthnya = $('#blthsptmanualcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_sptmanual.php[not_found]?blth="+blthnya,"_blank");
            
    	}

    	function prosessptmanual(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            var nipnya = $("#nipsptmanualcari").textbox('getValue');
    		$('#dlgsptmanual').dialog('open').dialog('setTitle','Proses sptmanual Masa');
    		$('#fmsptmanual').form('clear');
            $("#blthsptmanual").datebox('setValue', blthnya);
            //$("#nipsptmanual").textbox('setValue', nipnya);
    		url = '<?=$foldernya;?>save_sptmanual.php[not_found]';
    	}
    	function savesptmanual(){
            $.messager.progress({height:75, text:'Proses perhitungan sptmanual Masa'});            
    		$('#fmsptmanual').form('submit',{
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
                    //var result = eval('('+result+')');
    				if (result.errorMsg){
                        //$.messager.alert('Error',result.errorMsg,'error');
                        
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
                        
    				} else {
    					$('#dlgsptmanual').dialog('close');
    					$('#dgsptmanual').datagrid('reload');
    				}
    			}
    		});
    	}
    	function resetsptmanual(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            var nipnya = $("#nipsptmanualcari").textbox('getValue');
    		$('#dlgsptmanual2').dialog('open').dialog('setTitle','Reset sptmanual Masa');
    		$('#fmsptmanual2').form('clear');
            $("#blthsptmanual2").datebox('setValue', blthnya);
            //$("#nipsptmanual2").textbox('setValue', nipnya);
    		url2 = '<?=$foldernya;?>reset_sptmanual.php[not_found]';
    	}
    	function savesptmanual2(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Proses reset sptmanual Masa'});            
            		$('#fmsptmanual2').form('submit',{
            			url: url2,
            			onSubmit: function(){
                            //return $(this).form('enableValidation').form('validate');
                            var v=$(this).form('validate');
                            if(!v) $.messager.progress('close');
                            return v;
            			},
            			success: function(result){
                            //alert(result); 
                            //var result = eval('('+result+')');
                            //alert(result)
                            $.messager.progress('close');
            				if (result.errorMsg){
                                //$.messager.alert('Perhatian',result.errorMsg,'warning');
                                
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
                                
            				} else {
            					$('#dlgsptmanual2').dialog('close');
            					$('#dgsptmanual').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function prosessptmanual3(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            var nipnya = $("#nipsptmanualcari").textbox('getValue');
    		$('#dlgsptmanual3').dialog('open').dialog('setTitle','Proses sptmanualroll Perorangan');
    		$('#fmsptmanual3').form('clear');
            $("#blthsptmanual3").datebox('setValue', blthnya);
            $("#nipsptmanual3").textbox('setValue', nipnya);
    		url = 'save_sptmanual3.php[not_found]';
    	}
    	function savesptmanual3(){
    		$('#fmsptmanual3').form('submit',{
    			url: url,
    			onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
    			},
    			success: function(result){
                    //alert(result);    
                    var result = eval('('+result+')');   			 			 
    				if (result.errorMsg){
                        $.messager.alert('Perhatian',result.errorMsg,'warning');
    				} else {
    					$('#dlgsptmanual3').dialog('close');
    					$('#dgsptmanual').datagrid('reload');
    				}
    			}
    		});
    	}
    	function prosessptmanual4(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            var nipnya = $("#nipsptmanualcari").textbox('getValue');
    		$('#dlgsptmanual4').dialog('open').dialog('setTitle','Reset sptmanualroll Perorangan');
    		$('#fmsptmanual4').form('clear');
            $("#blthsptmanual4").datebox('setValue', blthnya);
            $("#nipsptmanual4").textbox('setValue', nipnya);
    		url2 = 'save_sptmanual4.php[not_found]';
    	}
    	function savesptmanual4(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
            		$('#fmsptmanual4').form('submit',{
            			url: url2,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result); 
                            var result = eval('('+result+')');   			 
            				if (result.errorMsg){
                                $.messager.alert('Perhatian',result.errorMsg,'warning');
                                /*
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
                                });
                                */
            				} else {
            					$('#dlgsptmanual4').dialog('close');
            					$('#dgsptmanual').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editsptmanual(){
    		var row = $('#dgsptmanual').datagrid('getSelected');
    		if (row){
    			$('#dlgsptmanual3').dialog('open').dialog('setTitle','Proses sptmanualroll Per Pegawai');
                $('#fmsptmanual3').form('clear');
    			$('#fmsptmanual3').form('load',row);            
    			url = 'save_sptmanual3.php[not_found]';
    		}
    	}
    	function destroysptmanual(){
    		var row = $('#dgsptmanual').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus sptmanual "'+row.nama_sptmanual+'"?',function(r){
    				if (r){
    					$.post('destroy_sptmanual.php[not_found]',{id:row.id},function(result){
    						if (result.success){
    							$('#dgsptmanual').datagrid('reload');
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
  
    	function cetakform(idnya){
            // var datanya = nipnya.split("|");
            // var nip = datanya[0];
            // var blth = datanya[1];
            // window.open('<?=$foldernya;?>cetakformmanual.php?nip='+nip+'&blth='+blth,'_blank'); 
            window.open('<?=$foldernya;?>cetakformmanual.php?id='+idnya,'_blank'); 
        }
    	function cetakform2(){
            // var blth = $("#blthsptmanualcari").datebox('getValue');
            var ids = [];
            var rows = $('#dgsptmanual').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idsptmanual);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakform2manual.php?ids2='+ids2,'_blank'); 
                // window.open('<?=$foldernya;?>cetakform2.php?blth='+blth+'&ids2='+ids2,'_blank'); 
            }
        }

    	function csvpph(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            var kelompoknya2 = $("#kelompoksptmanualcari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionsptmanualcari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangsptmanualcari").combobox('getValue');
            //window.open("exportcsv1721a1.php?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
            window.open("exportcsvmasa.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya,"_blank");
        }
        
    	function csv1721i(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            window.open("<?=$foldernya;?>exportcsvmasai.php?blth="+blthnya,"_blank");
        }
        
    	function lapsptmanual(){
            var blthnya = $("#blthsptmanualcari").datebox('getValue');
            var kelompoknya2 = $("#kelompoksptmanualcari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionsptmanualcari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangsptmanualcari").combobox('getValue');
            //alert(kd_regionnya+" "+kd_cabangnya);
            window.open("lapsptmanual.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthsptmanualcari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectsptmanualcari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitsptmanualcari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenissptmanualcari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategorisptmanualcari").combobox('getValue');
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_lategorinya2;
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2;
            //alert(urlnya);
            //alert(blthnya2+" "+kd_regionalnya2+" "+kd_unitnya2+" "+kd_jenisnya2+" "+kd_kategorinya2);
    		$('#dlglist').dialog('open').dialog('setTitle','List Gaji');
            $('#panellist').prop('src','cetaklist.php[not_found]?blth='+blthnya2+'&kd_project='+kd_projectnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_kategorinya2);
        }

    	function uploadcsv(){
    		$('#dlgcsv').dialog('open').dialog('setTitle','Upoad CSV');
            $('#fmcsv').form('clear');
    		url = '<?=$foldernya;?>save_csv.php';
    	}
    	function savecsv(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmcsv').form('submit',{
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
    					$('#dlgcsv').dialog('close');
    					$('#dgsptmanual').datagrid('reload');
    				}
    			}
    		});
    	}

        // $("#dgsptmanual").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmsptmanual{
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
    	.fitemsptmanual{
    		margin-bottom:5px;
    	}
    	.fitemsptmanual label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemsptmanual input{
    		width:200px;
    	}
    	#fmsptmanual.numberbox input{
    		text-align:right;
    	}
        .blinking{
            animation:blinkingText 1.2s infinite;
        }
        @keyframes blinkingText{
            0%{     color: red;    }
            49%{    color: red; }
            60%{    color: transparent; }
            99%{    color:transparent;  }
            100%{   color: red;    }
        }

    </style>
<?php
}
?>