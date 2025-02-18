<?php
// SPT Tahunan
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/pajak/";
    ?>
    <script type="text/javascript">                     
		function doSearchspt(){
            /*
            var blth = $('#blthsptcari').datebox('getValue');
            var kpp = $('#kppsptcari').combobox('getValue');
            var nip = $('#nipsptcari').textbox('getValue');
            alert(blth+" "+kpp+" "+nip);
            */
            $('#dgspt').datagrid('load',{
				blthsptcari: $('#blthsptcari').datebox('getValue'),
				kppsptcari: $('#kppsptcari').combobox('getValue'),
				nipsptcari: $('#nipsptcari').textbox('getValue')
			});
		}
        
        function onSelectregionsptcari(){
            var nilai1 = $('#kd_regionsptcari').combobox('getValue');
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai1;
            $('#kd_cabangsptcari').combobox('enable');
            $('#kd_cabangsptcari').combobox('clear'); 
            $('#kd_cabangsptcari').combobox('reload',url2);
            $('#kd_cabangsptcari').combobox('setValue','000');
            
            $('#kd_unitsptcari').combobox('enable');
            $('#kd_unitsptcari').combobox('clear'); 
            $('#kd_unitsptcari').combobox('reload',url3);
            $('#kd_unitsptcari').combobox('setValue','semua');
    	}
        
        function onSelectcabangsptcari(){
            var nilai1 = $('#kd_regionsptcari').combobox('getValue');
            var nilai2 = $('#kd_cabangsptcari').combobox('getValue');
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2;
            $('#kd_unitsptcari').combobox('enable');
            $('#kd_unitsptcari').combobox('clear'); 
            $('#kd_unitsptcari').combobox('reload',url2);
            $('#kd_unitsptcari').combobox('setValue','semua');
    	}
        
        function onSelectkelompokspt(){
            var nilai1 = $('#kelompokspt').combobox('getValue');
            var url3 = 'get_spt2.php[not_found]?kelompok='+nilai1;
            $('#no_spkspt').combogrid('clear');
            $('#no_spkspt').combogrid('grid').datagrid('reload',url3);
            $('#no_spkspt').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionspt(){
            var nilai1 = $('#kd_regionspt').combobox('getValue');
            var nilai2 = $('#kelompokspt').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_spt2.php[not_found]?kd_region='+nilai1+'&kelompok='+nilai2;
            $('#kd_cabangspt').combobox('enable');
            $('#kd_cabangspt').combobox('clear'); 
            $('#kd_cabangspt').combobox('reload',url2);
            $('#kd_cabangspt').combobox('setValue','000');
            
            $('#no_spkspt').combogrid('clear');
            $('#no_spkspt').combogrid('grid').datagrid('reload',url2);
            $('#no_spkspt').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangspt(){
            var nilai1 = $('#kd_regionspt').combobox('getValue');
            var nilai2 = $('#kd_cabangspt').combobox('getValue');
            var nilai3 = $('#kelompokspt').combobox('getValue');
            var url2 = 'get_spk2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2+'&kelompok='+nilai3;
            $('#no_spkspt').combogrid('clear');
            $('#no_spkspt').combogrid('grid').datagrid('reload',url2);
            $('#no_spkspt').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionspt2(){
            var nilai1 = $('#kd_regionspt2').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1;
            var url3 = 'get_unit2.php[not_found]?kd_region='+nilai1;
            $('#kd_cabangspt2').combobox('enable');
            $('#kd_cabangspt2').combobox('clear'); 
            $('#kd_cabangspt2').combobox('reload',url2);
            $('#kd_cabangspt2').combobox('setValue','000');
            
            $('#kd_unitspt2').combobox('enable');
            $('#kd_unitspt2').combobox('clear'); 
            $('#kd_unitspt2').combobox('reload',url3);
            $('#kd_unitspt2').combobox('setValue','semua');
    	}
        
        function onSelectcabangspt2(){
            var nilai1 = $('#kd_regionspt2').combobox('getValue');
            var nilai2 = $('#kd_cabangspt2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2;
            $('#kd_unitspt2').combobox('enable');
            $('#kd_unitspt2').combobox('clear'); 
            $('#kd_unitspt2').combobox('reload',url2);
            $('#kd_unitspt2').combobox('setValue','semua');
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
        
        function onSelectblthsptcari(){
            var nilai1 = $('#blthsptcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectprojectspt(){
            var nilai1 = $('#kd_projectspt').combobox('getValue');
            var url2 = '<?=$foldernya;?>get_unit.php?kd_project='+nilai1;
            $('#kd_unitspt').combobox('enable');
            $('#kd_unitspt').combobox('clear'); 
            $('#kd_unitspt').combobox('reload',url2);
    	}
        
        function onSelectprojectspt2(){
            var nilai1 = $('#kd_projectspt2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_project='+nilai1;
            $('#kd_unitspt2').combobox('enable');
            $('#kd_unitspt2').combobox('clear'); 
            $('#kd_unitspt2').combobox('reload',url2);
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
		function formspt(value,row,index){
            // var by2 = '<a href="javascript:void(0)" onclick="cetakform(\''+row.nipspt+'|'+row.blthspt+'\')" title="Form 1721-A1"><i class="fas fa-print fa-2x purple"></i></a>';
            var a = '<a href="javascript:void(0)" title="Cetak Form1721A1" onclick="cetakform(\''+row.nipspt+'|'+row.blthspt+'\')"><button class="easyui-linkbutton c1" style="min-width:60px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;">1721A1</button></a>';
            return a;
		}
    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgspt").datagrid({
            onDblClickRow: function() {
                //editspt();
            }
        });
        /*
        var today = new Date();
        var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
        var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();
        var dateTime = date+' '+time;            
        var namafilenya = "daftar spt "+dateTime+".xlsx";
        $('#namafiledownload').val(namafilenya);
        */        
    });
    </script>
    <table id="dgspt" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_spt.php" pageSize="20"        
    		toolbar="#toolbarspt" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="ck" checkbox="true"></th>
                <th rowspan="2" field="formspt" width="80" align="center" halign="center" data-options="formatter:formspt">Form<br/>1721A1</th>
    			<th rowspan="2" field="nipspt" width="140" sortable="true" align="center" halign="center">No Induk</th>
    			<th rowspan="2" field="namaspt" width="140" sortable="true" align="left" halign="center">Nama Pegawai</th>
    			<th rowspan="2" field="jabatanspt" width="200" sortable="true" align="left" halign="center">Jabatan</th>
    			<th rowspan="2" field="statusspt" width="80" sortable="true" align="center" halign="center">Status</th>
    			<th rowspan="2" field="npwpspt" width="160" sortable="true" align="center" halign="center">NPWP</th>
    			<th rowspan="2" field="no_urutspt" width="80" sortable="true" align="center" halign="center">No Urut</th>
    			<th rowspan="2" field="blthspt" width="70" sortable="true" align="center" halign="center">Bulan<br />Pajak</th>
    			<th rowspan="2" field="blth_awalspt" width="70" sortable="true" align="center" halign="center">BLTH<br/>Awal</th>
    			<th rowspan="2" field="blth_akhirspt" width="70" sortable="true" align="center" halign="center">BLTH<br/>Akhir</th>
    			<th rowspan="2" field="masa_kerjaspt" width="60" sortable="true" align="center" halign="center">Jumlah<br/>Bulan</th>
    			<th rowspan="2" field="gajispt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Gaji</th>
    			<th rowspan="2" field="tunjangan_pphspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />PPh</th>
    			<th rowspan="2" field="tunjangan_variablespt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />Lainnya</th>
    			<th rowspan="2" field="honorariumspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Honorarium</th>
    			<th rowspan="2" field="benefitspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Benefit</th>
    			<th rowspan="2" field="natunaspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Natura</th>
                <th rowspan="2" field="beban_pph21spt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Beban PPh</th>
                <th colspan="3"><span style="font-weight:bold;">Rutin (Bulan)</span></th>
                <th colspan="5"><span style="font-weight:bold;">Rutin (Disetahunkan)</span></th>
    			<th rowspan="2" field="bonus_thrspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Non Rutin</th>
    			<th rowspan="2" field="nettot_sebelumnyaspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto Masa<br />Sebelumnya</th>
    			<th rowspan="2" field="nettot_akhirspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br />Untuk PKP</th>
    			<th rowspan="2" field="ptkpspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PTKP</th>
    			<th rowspan="2" field="pkpspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PKP</th>
    			<th rowspan="2" field="pphtspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh<br />Setahun</th>
    			<th rowspan="2" field="ppht_sebelumnyaspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Sudah<br />Dipotong</th>
    			<th rowspan="2" field="ppht_terutangspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Terutang<br />Setahun</th>
                <th rowspan="2" field="pphb_terutangspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Terutang<br />Bulan Ini</th>
            </tr>
            <tr>
    			<th field="brutobspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatanbspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiunbspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>

    			<th field="brutotspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatantspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiuntspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>
    			<th field="biaya_pengurangtspt" width="110" sortable="true" align="right" halign="center" formatter="formatrp2">B.Pengurang<br/>(4)</th>
    			<th field="nettotspt" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br/>(5)</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarspt">
    	<div id="tbspt" style="padding:3px">
            <table>
            <tr>
                <td>BULAN</td>
                <td colspan="6">
                    <input class="easyui-datebox" id="blthsptcari" name="blthsptcari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>KPP</td>
                <td>
                    <input class="easyui-combobox"
                        id="kppsptcari" editable="false"
                        name="kppsptcari" value="SEMUA"
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
                    <input class="easyui-textbox" id="nipsptcari" name="nipsptcari" data-options="required:false,prompt:''" style="width: 200px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchspt()" style="min-width:90px;">Search</a>                    
                    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-cog" plain="false" onclick="prosesspt()" style="min-width:90px;">Proses SPT</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" plain="false" onclick="resetspt()" style="min-width:90px;">Reset SPT</a>
                </td>
            </tr>
            </table>
            <table>
            <!-- <tr>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-cog" plain="false" onclick="prosesspt()" style="min-width:90px;">Proses SPT Masa</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" plain="false" onclick="resetspt()" style="min-width:90px;">Reset SPT Masa</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csv1721i()" style="min-width:90px;">1721-I CSV</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" plain="false" onclick="downloadspt()" style="min-width:90px;">Download SPT Masa</a></td>                
            </tr> -->
            <tr>
                <td><a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-print" onclick="cetakform2()" style="min-width:90px;">Form 1721-A1 Kolektif</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csvpph()" style="min-width:90px;">1721-A1 CSV</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file" onclick="csv1721i()" style="min-width:90px;">1721-I CSV</a></td>
                <td><a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-print" onclick="lapspt()" style="min-width:90px;">Rekapitulasi Pajak Tahunan</a></td>
                <td><a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file-excel" onclick="downloadspt()" style="min-width:90px;margin-left:10px;">Download Data</a></td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgspt" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonsspt">
    	<form id="fmspt" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthspt" name="blthspt" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipspt" name="nipspt" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsspt">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savespt()" style="min-width:90px">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgspt').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgspt2" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonsspt2">
    	<form id="fmspt2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthspt2" name="blthspt2" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipspt2" name="nipspt2" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsspt2">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-reply" onclick="savespt2()" style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgspt2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgspt3" class="easyui-dialog" modal="true" style="min-width:280px;min-height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonsspt3">
    	<form id="fmspt3" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthspt3" name="blthspt3" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipspt3" name="nipspt3" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsspt3">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savespt3()" style="width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgspt3').dialog('close')" style="width:90px">Batal</a>
    </div>
    
    <div id="dlgspt4" class="easyui-dialog" modal="true" style="width:280px;height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonsspt4">
    	<form id="fmspt4" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthspt4" name="blthspt4" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipspt4" name="nipspt4" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsspt4">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savespt4()" style="width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgspt4').dialog('close')" style="width:90px">Batal</a>
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
        
    	function downloadspt(){  
            /*
            var kelompoknya = $('#kelompoksptcari').combobox('getValue');
            var kd_regionnya = $('#kd_regionsptcari').combobox('getValue');
            var kd_cabangnya = $('#kd_cabangsptcari').combobox('getValue');
            var kd_unitnya = $('#kd_unitsptcari').combobox('getValue');
            var nipnya = $('#nipsptcari').textbox('getValue');
            var blthnya = $('#blthsptcari').datebox('getValue');
            var namafiledownload = $('#namafiledownload').val();

            //window.open("download_spt.php?kelompok="+kelompoknya+"&region="+kd_regionnya+"&cabang="+kd_cabangnya+"&unit="+kd_unitnya+"&nip="+nipnya+"&blth="+blthnya,"_blank");
            
            $(".box").html("");
            myStartFunctionspt();
            $.post('download_spt.php',{kelompok:kelompoknya,region:kd_regionnya,cabang:kd_cabangnya,unit:kd_unitnya,nip:nipnya,blth:blthnya,namafile:namafiledownload},function(result){
                if (result.success){
                } else {
                }
            },'json');  
            */
            var blthnya = $('#blthsptcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_spt.php?blth="+blthnya,"_blank");
            
    	}

    	function prosesspt(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            var nipnya = $("#nipsptcari").textbox('getValue');
    		$('#dlgspt').dialog('open').dialog('setTitle','Proses SPT Masa');
    		$('#fmspt').form('clear');
            $("#blthspt").datebox('setValue', blthnya);
            //$("#nipspt").textbox('setValue', nipnya);
    		url = '<?=$foldernya;?>save_spt.php[not_found]';
    	}
    	function savespt(){
            $.messager.progress({height:75, text:'Proses perhitungan SPT Masa'});            
    		$('#fmspt').form('submit',{
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
    					$('#dlgspt').dialog('close');
    					$('#dgspt').datagrid('reload');
    				}
    			}
    		});
    	}
    	function resetspt(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            var nipnya = $("#nipsptcari").textbox('getValue');
    		$('#dlgspt2').dialog('open').dialog('setTitle','Reset SPT Masa');
    		$('#fmspt2').form('clear');
            $("#blthspt2").datebox('setValue', blthnya);
            //$("#nipspt2").textbox('setValue', nipnya);
    		url2 = '<?=$foldernya;?>reset_spt.php[not_found]';
    	}
    	function savespt2(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Proses reset SPT Masa'});            
            		$('#fmspt2').form('submit',{
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
            					$('#dlgspt2').dialog('close');
            					$('#dgspt').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function prosesspt3(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            var nipnya = $("#nipsptcari").textbox('getValue');
    		$('#dlgspt3').dialog('open').dialog('setTitle','Proses sptroll Perorangan');
    		$('#fmspt3').form('clear');
            $("#blthspt3").datebox('setValue', blthnya);
            $("#nipspt3").textbox('setValue', nipnya);
    		url = 'save_spt3.php[not_found]';
    	}
    	function savespt3(){
    		$('#fmspt3').form('submit',{
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
    					$('#dlgspt3').dialog('close');
    					$('#dgspt').datagrid('reload');
    				}
    			}
    		});
    	}
    	function prosesspt4(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            var nipnya = $("#nipsptcari").textbox('getValue');
    		$('#dlgspt4').dialog('open').dialog('setTitle','Reset sptroll Perorangan');
    		$('#fmspt4').form('clear');
            $("#blthspt4").datebox('setValue', blthnya);
            $("#nipspt4").textbox('setValue', nipnya);
    		url2 = 'save_spt4.php[not_found]';
    	}
    	function savespt4(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
            		$('#fmspt4').form('submit',{
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
            					$('#dlgspt4').dialog('close');
            					$('#dgspt').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editspt(){
    		var row = $('#dgspt').datagrid('getSelected');
    		if (row){
    			$('#dlgspt3').dialog('open').dialog('setTitle','Proses sptroll Per Pegawai');
                $('#fmspt3').form('clear');
    			$('#fmspt3').form('load',row);            
    			url = 'save_spt3.php[not_found]';
    		}
    	}
    	function destroyspt(){
    		var row = $('#dgspt').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus spt "'+row.nama_spt+'"?',function(r){
    				if (r){
    					$.post('destroy_spt.php[not_found]',{id:row.id},function(result){
    						if (result.success){
    							$('#dgspt').datagrid('reload');
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
            window.open('<?=$foldernya;?>cetakform.php?nip='+nip+'&blth='+blth,'_blank'); 
        }
    	function cetakform2(){
            // var blth = $("#blthsptcari").datebox('getValue');
            var ids = [];
            var rows = $('#dgspt').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idspt);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakform2.php?ids2='+ids2,'_blank'); 
            }
        }

    	function csvpph(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            var kelompoknya2 = $("#kelompoksptcari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionsptcari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangsptcari").combobox('getValue');
            //window.open("exportcsv1721a1.php?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
            window.open("exportcsvmasa.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya,"_blank");
        }
        
    	function csv1721i(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            window.open("<?=$foldernya;?>exportcsvmasai.php?blth="+blthnya,"_blank");
        }
        
    	function lapspt(){
            var blthnya = $("#blthsptcari").datebox('getValue');
            var kelompoknya2 = $("#kelompoksptcari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionsptcari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangsptcari").combobox('getValue');
            //alert(kd_regionnya+" "+kd_cabangnya);
            window.open("lapspt.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthsptcari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectsptcari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitsptcari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenissptcari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategorisptcari").combobox('getValue');
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_lategorinya2;
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2;
            //alert(urlnya);
            //alert(blthnya2+" "+kd_regionalnya2+" "+kd_unitnya2+" "+kd_jenisnya2+" "+kd_kategorinya2);
    		$('#dlglist').dialog('open').dialog('setTitle','List Gaji');
            $('#panellist').prop('src','cetaklist.php[not_found]?blth='+blthnya2+'&kd_project='+kd_projectnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_kategorinya2);
        }
        
    	function downloadspt(){  
            var blthnya = $('#blthsptcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_spt.php?blth="+blthnya,"_blank");
            
    	}

        // $("#dgspt").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmspt{
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
    	.fitemspt{
    		margin-bottom:5px;
    	}
    	.fitemspt label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemspt input{
    		width:200px;
    	}
    	#fmspt.numberbox input{
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