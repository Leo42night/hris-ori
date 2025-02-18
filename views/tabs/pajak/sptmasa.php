<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/pajak/";
    $blth = date("Y-m",strtotime('+1 hour'));
    ?>
    <script type="text/javascript">                     
		function doSearchsptmasa(){
            var blth = $('#blthsptmasacari').datebox('getValue');
            var data = blth.split("-");
            var bulan = data[1];
            if(bulan==="12"){
                $("#divspt").show();
            } else {
                $("#divspt").hide();
            }
            $('#dgsptmasa').datagrid('load',{
				blthsptmasacari: $('#blthsptmasacari').datebox('getValue'),
				kppsptmasacari: $('#kppsptmasacari').combobox('getValue'),
				nipsptmasacari: $('#nipsptmasacari').textbox('getValue')
			});
		}
        
        function onSelectregionsptmasacari(){
            var nilai1 = $('#kd_regionsptmasacari').combobox('getValue');
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai1; // not found
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai1; // not found
            $('#kd_cabangsptmasacari').combobox('enable');
            $('#kd_cabangsptmasacari').combobox('clear'); 
            $('#kd_cabangsptmasacari').combobox('reload',url2);
            $('#kd_cabangsptmasacari').combobox('setValue','000');
            
            $('#kd_unitsptmasacari').combobox('enable');
            $('#kd_unitsptmasacari').combobox('clear'); 
            $('#kd_unitsptmasacari').combobox('reload',url3);
            $('#kd_unitsptmasacari').combobox('setValue','semua');
    	}
        
        function onSelectcabangsptmasacari(){
            var nilai1 = $('#kd_regionsptmasacari').combobox('getValue');
            var nilai2 = $('#kd_cabangsptmasacari').combobox('getValue');
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2; // not found
            $('#kd_unitsptmasacari').combobox('enable');
            $('#kd_unitsptmasacari').combobox('clear'); 
            $('#kd_unitsptmasacari').combobox('reload',url2);
            $('#kd_unitsptmasacari').combobox('setValue','semua');
    	}
        
        function onSelectkelompoksptmasa(){
            var nilai1 = $('#kelompoksptmasa').combobox('getValue');
            var url3 = 'get_spt2.php[not_found]?kelompok='+nilai1;
            $('#no_spksptmasa').combogrid('clear');
            $('#no_spksptmasa').combogrid('grid').datagrid('reload',url3);
            $('#no_spksptmasa').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsptmasa(){
            var nilai1 = $('#kd_regionsptmasa').combobox('getValue');
            var nilai2 = $('#kelompoksptmasa').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_spt2.php[not_found]?kd_region='+nilai1+'&kelompok='+nilai2;
            $('#kd_cabangsptmasa').combobox('enable');
            $('#kd_cabangsptmasa').combobox('clear'); 
            $('#kd_cabangsptmasa').combobox('reload',url2);
            $('#kd_cabangsptmasa').combobox('setValue','000');
            
            $('#no_spksptmasa').combogrid('clear');
            $('#no_spksptmasa').combogrid('grid').datagrid('reload',url2);
            $('#no_spksptmasa').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangsptmasa(){
            var nilai1 = $('#kd_regionsptmasa').combobox('getValue');
            var nilai2 = $('#kd_cabangsptmasa').combobox('getValue');
            var nilai3 = $('#kelompoksptmasa').combobox('getValue');
            var url2 = 'get_spk2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2+'&kelompok='+nilai3;
            $('#no_spksptmasa').combogrid('clear');
            $('#no_spksptmasa').combogrid('grid').datagrid('reload',url2);
            $('#no_spksptmasa').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsptmasa2(){
            var nilai1 = $('#kd_regionsptmasa2').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_unit2.php[not_found]?kd_region='+nilai1;
            $('#kd_cabangsptmasa2').combobox('enable');
            $('#kd_cabangsptmasa2').combobox('clear'); 
            $('#kd_cabangsptmasa2').combobox('reload',url2);
            $('#kd_cabangsptmasa2').combobox('setValue','000');
            
            $('#kd_unitsptmasa2').combobox('enable');
            $('#kd_unitsptmasa2').combobox('clear'); 
            $('#kd_unitsptmasa2').combobox('reload',url3);
            $('#kd_unitsptmasa2').combobox('setValue','semua');
    	}
        
        function onSelectcabangsptmasa2(){
            var nilai1 = $('#kd_regionsptmasa2').combobox('getValue');
            var nilai2 = $('#kd_cabangsptmasa2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2;
            $('#kd_unitsptmasa2').combobox('enable');
            $('#kd_unitsptmasa2').combobox('clear'); 
            $('#kd_unitsptmasa2').combobox('reload',url2);
            $('#kd_unitsptmasa2').combobox('setValue','semua');
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
        
        function onSelectblthsptmasacari(){
            var nilai1 = $('#blthsptmasacari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectprojectsptmasa(){
            var nilai1 = $('#kd_projectsptmasa').combobox('getValue');
            var url2 = 'get_unit.php?kd_project='+nilai1;
            $('#kd_unitsptmasa').combobox('enable');
            $('#kd_unitsptmasa').combobox('clear'); 
            $('#kd_unitsptmasa').combobox('reload',url2);
    	}
        
        function onSelectprojectsptmasa2(){
            var nilai1 = $('#kd_projectsptmasa2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_project='+nilai1;
            $('#kd_unitsptmasa2').combobox('enable');
            $('#kd_unitsptmasa2').combobox('clear'); 
            $('#kd_unitsptmasa2').combobox('reload',url2);
    	}

        function cekbulan(){
            var blth = $('#blthsptmasacari').datebox('getValue');
            var data = blth.split("-");
            var bulan = data[1];
            if(bulan==="12"){
                $("#divspt").show();
            } else {
                $("#divspt").hide();
            }
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
		function form(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakform(\''+row.nipsptmasa+'|'+row.blthsptmasa+'\')" title="Form 1721-A1"><i class="fas fa-print fa-2x purple"></i></a>';
            return by2;
		}
		function formspt(value,row,index){
            var data = row.blthsptmasa.split("-");
            var bulan = data[1];
            if(parseInt(bulan)===12){
                var a = '<a href="javascript:void(0)" title="Cetak Form1721A1" onclick="cetakformrampung(\''+row.nipsptmasa+'|'+row.blthsptmasa+'\')"><button class="easyui-linkbutton c1" style="min-width:60px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;">1721A1</button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="min-width:60px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;">1721A1</button></a>';
            }
            return a;
		}

    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgsptmasa").datagrid({
            onDblClickRow: function() {
                //editsptmasa();
            }
        });
        $("#divspt").hide();
    });
    </script>
    <table id="dgsptmasa" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_sptmasa.php" pageSize="20"        
    		toolbar="#toolbarsptmasa" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead frozen="true">
    		<tr>
                <th field="ck" checkbox="true"></th>
                <th field="formspt" width="80" align="center" halign="center" data-options="formatter:formspt">Form<br/>1721A1</th>
    			<th field="nipsptmasa" width="140" sortable="true" align="center" halign="center">No Induk</th>
    			<th field="namasptmasa" width="140" sortable="true" align="left" halign="center">Nama Pegawai</th>
        </thead>
    	<thead>
    		<tr>
    			<!-- <th rowspan="2" field="nipsptmasa" width="140" sortable="true" align="center" halign="center">No Induk</th>
    			<th rowspan="2" field="namasptmasa" width="140" sortable="true" align="left" halign="center">Nama Pegawai</th> -->                
    			<th rowspan="2" field="jabatansptmasa" width="200" sortable="true" align="left" halign="center">Jabatan</th>
    			<th rowspan="2" field="statussptmasa" width="80" sortable="true" align="center" halign="center">Status</th>
    			<th rowspan="2" field="npwpsptmasa" width="160" sortable="true" align="center" halign="center">NPWP</th>
    			<th rowspan="2" field="no_urutsptmasa" width="80" sortable="true" align="center" halign="center">No Urut</th>
    			<th rowspan="2" field="blthsptmasa" width="70" sortable="true" align="center" halign="center">Bulan<br />Pajak</th>
    			<th rowspan="2" field="blth_awalsptmasa" width="70" sortable="true" align="center" halign="center">BLTH<br/>Awal</th>
    			<th rowspan="2" field="blth_akhirsptmasa" width="70" sortable="true" align="center" halign="center">BLTH<br/>Akhir</th>
    			<th rowspan="2" field="masa_kerjasptmasa" width="60" sortable="true" align="center" halign="center">Jumlah<br/>Bulan</th>
    			<th rowspan="2" field="gajisptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Gaji</th>
    			<th rowspan="2" field="tunjangan_pphsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />PPh</th>
    			<th rowspan="2" field="tunjangan_variablesptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />Lainnya</th>
    			<th rowspan="2" field="honorariumsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Honorarium</th>
    			<th rowspan="2" field="benefitsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Benefit</th>
    			<th rowspan="2" field="natunasptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Natura</th>
                <th rowspan="2" field="beban_pph21sptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Beban PPh</th>
                <th colspan="3"><span style="font-weight:bold;">Rutin (Bulan)</span></th>
                <th colspan="5"><span style="font-weight:bold;">Rutin (Disetahunkan)</span></th>
    			<th rowspan="2" field="bonus_thrsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Non Rutin</th>
                <th colspan="5"><span style="font-weight:bold;">Total (Rutin + Non Rutin)</span></th>
    			<th rowspan="2" field="nettot_sebelumnyasptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto Masa<br />Sebelumnya</th>
    			<th rowspan="2" field="nettot_akhirsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br />Untuk PKP</th>
    			<th rowspan="2" field="ptkpsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PTKP</th>
    			<th rowspan="2" field="pkpsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PKP</th>
    			<th rowspan="2" field="pphtsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh<br />Setahun</th>
    			<th rowspan="2" field="ppht_sebelumnyasptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Sudah<br />Dipotong</th>
    			<th rowspan="2" field="ppht_terutangsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Terutang<br />Setahun</th>
    			<th colspan="3">PPh Terutang Bulan Ini</th>
    			<!--<th field="tgl_proses2sptmasa" width="140" sortable="true" align="center" halign="center">Tgl Proses</th>-->
            </tr>
            <tr>
    			<th field="brutobsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatanbsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiunbsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>

    			<th field="brutotsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatantsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiuntsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>
    			<th field="biaya_pengurangtsptmasa" width="110" sortable="true" align="right" halign="center" formatter="formatrp2">B.Pengurang<br/>(4)</th>
    			<th field="nettotsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br/>(5)</th>

    			<th field="brutot_totalsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatant_totalsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiunt_totalsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>
    			<th field="biaya_pengurangt_totalsptmasa" width="110" sortable="true" align="right" halign="center" formatter="formatrp2">B.Pengurang<br/>(4)</th>
    			<th field="nettot_totalsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br/>(5)</th>

                <th field="pphb1_terutangsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Rutin</th>
                <th field="pphb2_terutangsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Non Rutin</th>
                <th field="pphb_terutangsptmasa" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Total</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarsptmasa">
    	<div id="tbsptmasa" style="padding:3px">
            <table>
            <tr>
                <td>BULAN</td>
                <td colspan="6">
                    <input class="easyui-datebox" id="blthsptmasacari" name="1blthsptmasacari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>KPP</td>
                <td>
                    <input class="easyui-combobox"
                        id="kppsptmasacari" editable="false"
                        name="kppsptmasacari" value="SEMUA"
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
                    <input class="easyui-textbox" id="nipsptmasacari" name="nipsptmasacari" data-options="required:false,prompt:''" style="width: 200px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchsptmasa()" style="min-width:90px;">Search</a>                    
                </td>
            </tr>
            </table>
            <table>
            <tr>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-cog" plain="false" onclick="prosessptmasa()" style="min-width:90px;">Proses SPT Masa</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" plain="false" onclick="resetsptmasa()" style="min-width:90px;">Reset SPT Masa</a></td>
                <!--<td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csvpph()" style="min-width:90px;">1721-A1 CSV</a></td>-->
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csv1721i()" style="min-width:90px;">1721-I CSV</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" plain="false" onclick="downloadsptmasa()" style="min-width:90px;">Download SPT Masa</a></td>                
                <td><a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" plain="false" onclick="downloadmsptmasa()" style="min-width:90px;">Download Mapping SPT Masa</a></td>                
            </tr>
            </table>
            <div id="divspt">
                <table>
                <tr>
                    <td><a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-print" onclick="cetakformrampung2()" style="min-width:90px;">Form 1721-A1 Kolektif</a></td>
                    <!--
                    <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csvpph()" style="min-width:90px;">1721-A1 CSV</a></td>
                    <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csv1721i()" style="min-width:90px;">1721-I CSV</a></td>
                    -->
                    <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-print" onclick="lapspt()" style="min-width:90px;">Rekapitulasi Pajak Tahunan</a></td>
                </tr>
                </table>
            </div>
    	</div>
    </div>
    
    <div id="dlgsptmasa" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmasa">
    	<form id="fmsptmasa" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="userhris" name="userhris" value="">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmasa" name="blthsptmasa" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>KPP</td>
                <td>
                    <input class="easyui-combobox"
                        id="kppsptmasa" editable="false"
                        name="kppsptmasa" value="SEMUA"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            url:'<?=$foldernya;?>get_kppcari.php',
                            required:true,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'auto'
            		">
                </td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipsptmasa" name="nipsptmasa" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmasa">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savesptmasa()" style="min-width:90px">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsptmasa').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsptmasa2" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmasa2">
    	<form id="fmsptmasa2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmasa2" name="blthsptmasa2" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipsptmasa2" name="nipsptmasa2" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmasa2">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-reply" onclick="savesptmasa2()" style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsptmasa2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsptmasa3" class="easyui-dialog" modal="true" style="min-width:280px;min-height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmasa3">
    	<form id="fmsptmasa3" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmasa3" name="blthsptmasa3" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipsptmasa3" name="nipsptmasa3" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmasa3">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savesptmasa3()" style="width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgsptmasa3').dialog('close')" style="width:90px">Batal</a>
    </div>
    
    <div id="dlgsptmasa4" class="easyui-dialog" modal="true" style="width:280px;height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonssptmasa4">
    	<form id="fmsptmasa4" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthsptmasa4" name="blthsptmasa4" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipsptmasa4" name="nipsptmasa4" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssptmasa4">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savesptmasa4()" style="width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgsptmasa4').dialog('close')" style="width:90px">Batal</a>
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
        
    	function downloadsptmasa(){  
            var blthnya = $('#blthsptmasacari').datebox('getValue');
            window.open("<?=$foldernya;?>download_sptmasa.php?blth="+blthnya,"_blank");
            
    	}
        
    	function downloadmsptmasa(){  
            var blthnya = $('#blthsptmasacari').datebox('getValue');
            window.open("<?=$foldernya;?>download_msptmasa.php?blth="+blthnya,"_blank");
            
    	}

    	function prosessptmasa(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            var kppnya = $("#kppsptmasacari").combobox('getValue');
            var nipnya = $("#nipsptmasacari").textbox('getValue');
    		$('#dlgsptmasa').dialog('open').dialog('setTitle','Proses SPT Masa');
    		$('#fmsptmasa').form('clear');
            $("#blthsptmasa").datebox('setValue', blthnya);
            $("#kppsptmasa").combobox('setValue', kppnya);
            $("#userhris").val("<?=$userhris;?>");            
            // $("#nipsptmasa").textbox('setValue', nipnya);
    		url = '<?=$foldernya;?>save_sptmasa.php';
            // url = 'https://36.64.235.218/plnndcustom/save_sptmasa.php';
    	}
    	function savesptmasa(){
            // alert(url);
            $.messager.progress({height:75, text:'Proses perhitungan SPT Masa'});            
    		$('#fmsptmasa').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    // alert(result);    			 
                    $.messager.progress('close');
                    //var result = eval('('+result+')');
    				if (result.errorMsg){
                        //$.messager.alert('Error',result.errorMsg,'error');
                        
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
                        
    				} else {
    					$('#dlgsptmasa').dialog('close');
    					$('#dgsptmasa').datagrid('reload');
    				}
    			}
    		});
    	}
    	function resetsptmasa(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            var nipnya = $("#nipsptmasacari").textbox('getValue');
    		$('#dlgsptmasa2').dialog('open').dialog('setTitle','Reset SPT Masa');
    		$('#fmsptmasa2').form('clear');
            $("#blthsptmasa2").datebox('setValue', blthnya);
            //$("#nipsptmasa2").textbox('setValue', nipnya);
    		url2 = '<?=$foldernya;?>reset_sptmasa.php';
    	}
    	function savesptmasa2(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Proses reset SPT Masa'});            
            		$('#fmsptmasa2').form('submit',{
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
            					$('#dlgsptmasa2').dialog('close');
            					$('#dgsptmasa').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function prosessptmasa3(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            var nipnya = $("#nipsptmasacari").textbox('getValue');
    		$('#dlgsptmasa3').dialog('open').dialog('setTitle','Proses sptmasaroll Perorangan');
    		$('#fmsptmasa3').form('clear');
            $("#blthsptmasa3").datebox('setValue', blthnya);
            $("#nipsptmasa3").textbox('setValue', nipnya);
    		url = 'save_sptmasa3.php[not_found]'; 
    	}
    	function savesptmasa3(){
    		$('#fmsptmasa3').form('submit',{
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
    					$('#dlgsptmasa3').dialog('close');
    					$('#dgsptmasa').datagrid('reload');
    				}
    			}
    		});
    	}
    	function prosessptmasa4(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            // var kppnya = $("#kppsptmasacari").combobox('getValue');
            var nipnya = $("#nipsptmasacari").textbox('getValue');
    		$('#dlgsptmasa4').dialog('open').dialog('setTitle','Reset sptmasaroll Perorangan');
    		$('#fmsptmasa4').form('clear');
            $("#blthsptmasa4").datebox('setValue', blthnya);
            $("#nipsptmasa4").textbox('setValue', nipnya);
            // $("#kppsptmasa4").combobox('setValue', kppnya);
    		url2 = 'save_sptmasa4.php[not_found]';
    	}
    	function savesptmasa4(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
            		$('#fmsptmasa4').form('submit',{
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
            					$('#dlgsptmasa4').dialog('close');
            					$('#dgsptmasa').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editsptmasa(){
    		var row = $('#dgsptmasa').datagrid('getSelected');
    		if (row){
    			$('#dlgsptmasa3').dialog('open').dialog('setTitle','Proses sptmasaroll Per Pegawai');
                $('#fmsptmasa3').form('clear');
    			$('#fmsptmasa3').form('load',row);            
    			url = 'save_sptmasa3.php[not_found]';
    		}
    	}
    	function destroysptmasa(){
    		var row = $('#dgsptmasa').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus sptmasa "'+row.nama_sptmasa+'"?',function(r){
    				if (r){
    					$.post('destroy_sptmasa.php[not_found]',{id:row.id},function(result){
    						if (result.success){
    							$('#dgsptmasa').datagrid('reload');
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
  
    	function cetakform(nipnya){
            var datanya = nipnya.split("|");
            var nip = datanya[0];
            var blth = datanya[1];
    		//$('#dlgform').dialog('open').dialog('setTitle','Form 1721-A1');
            //$('#panelform').prop('src','cetakform.php?nip='+nip+'&blth='+blth);
            window.open('cetakform.php?nip='+nip+'&blth='+blth,'_blank'); 
        }
        /*
    	function cetakform2(){
            var blthnya2 = $("#blthsptmasacari").datebox('getValue');
            var kd_regionnya2 = $("#kd_regionsptmasacari").combobox('getValue');
            var kd_cabangnya2 = $("#kd_cabangsptmasacari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitsptmasacari").combobox('getValue');
            
    		$('#dlgform2').dialog('open').dialog('setTitle','Form 1721-A1 Kolektif');
            $('#panelform2').prop('src','cetakform2.php?blth='+blthnya2+'&kd_region='+kd_regionnya2+'&kd_cabang='+kd_cabangnya2+'&kd_unit='+kd_unitnya2);
            
        }
        */
    	function cetakform2(){
            var ids = [];
            var rows = $('#dgsptmasa').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idsptmasa);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                //$('#dlgform2').dialog('open').dialog('setTitle','Form 1721-A1 Kolektif');
                //$('#panelform2').prop('src','cetakform2.php?ids2='+ids2);
                window.open('cetakform2.php?ids2='+ids2,'_blank'); 
            }
        }

    	function csvpph(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            var kelompoknya2 = $("#kelompoksptmasacari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionsptmasacari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangsptmasacari").combobox('getValue');
            //window.open("exportcsv1721a1.php?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
            window.open("exportcsvmasa.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya,"_blank");
        }
        
    	function csv1721i(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            window.open("<?=$foldernya;?>exportcsvmasai.php?blth="+blthnya,"_blank");
        }
        
    	function lapspt(){
            var blthnya = $("#blthsptmasacari").datebox('getValue');
            var kelompoknya2 = $("#kelompoksptmasacari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionsptmasacari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangsptmasacari").combobox('getValue');
            //alert(kd_regionnya+" "+kd_cabangnya);
            window.open("lapspt.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
        }
  
    	function cetakformrampung(nipnya){
            var datanya = nipnya.split("|");
            var nip = datanya[0];
            var blth = datanya[1];
            window.open('<?=$foldernya;?>cetakformrampung.php?nip='+nip+'&blth='+blth,'_blank'); 
        }
    	function cetakformrampung2(){
            // var blth = $("#blthsptcari").datebox('getValue');
            var ids = [];
            var rows = $('#dgsptmasa').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idsptmasa);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakformrampung2.php?ids2='+ids2,'_blank'); 
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthsptmasacari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectsptmasacari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitsptmasacari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenissptmasacari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategorisptmasacari").combobox('getValue');
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_lategorinya2;
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2;
            //alert(urlnya);
            //alert(blthnya2+" "+kd_regionalnya2+" "+kd_unitnya2+" "+kd_jenisnya2+" "+kd_kategorinya2);
    		$('#dlglist').dialog('open').dialog('setTitle','List Gaji');
            $('#panellist').prop('src','cetaklist.php[not_found]?blth='+blthnya2+'&kd_project='+kd_projectnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_kategorinya2);
        }
        // $("#dgsptmasa").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmsptmasa{
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
    	.fitemsptmasa{
    		margin-bottom:5px;
    	}
    	.fitemsptmasa label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemsptmasa input{
    		width:200px;
    	}
    	#fmsptmasa.numberbox input{
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