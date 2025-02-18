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
		function doSearchbebanpph(){
            /*
            var blth = $('#blthbebanpphcari').datebox('getValue');
            var kpp = $('#kppbebanpphcari').combobox('getValue');
            var nip = $('#nipbebanpphcari').textbox('getValue');
            alert(blth+" "+kpp+" "+nip);
            */
            $('#dgbebanpph').datagrid('load',{
				blthbebanpphcari: $('#blthbebanpphcari').datebox('getValue'),
				kppbebanpphcari: $('#kppbebanpphcari').combobox('getValue'),
				nipbebanpphcari: $('#nipbebanpphcari').textbox('getValue')
			});
		}
        
        function onSelectregionbebanpphcari(){
            var nilai1 = $('#kd_regionbebanpphcari').combobox('getValue');
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai1; // tidak ditemukan
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai1; // tidak ditemukan
            $('#kd_cabangbebanpphcari').combobox('enable');
            $('#kd_cabangbebanpphcari').combobox('clear'); 
            $('#kd_cabangbebanpphcari').combobox('reload',url2);
            $('#kd_cabangbebanpphcari').combobox('setValue','000');
            
            $('#kd_unitbebanpphcari').combobox('enable');
            $('#kd_unitbebanpphcari').combobox('clear'); 
            $('#kd_unitbebanpphcari').combobox('reload',url3);
            $('#kd_unitbebanpphcari').combobox('setValue','semua');
    	}
        
        function onSelectcabangbebanpphcari(){
            var nilai1 = $('#kd_regionbebanpphcari').combobox('getValue');
            var nilai2 = $('#kd_cabangbebanpphcari').combobox('getValue');
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2; // tidak ditemukan
            $('#kd_unitbebanpphcari').combobox('enable');
            $('#kd_unitbebanpphcari').combobox('clear'); 
            $('#kd_unitbebanpphcari').combobox('reload',url2);
            $('#kd_unitbebanpphcari').combobox('setValue','semua');
    	}
        
        function onSelectkelompokbebanpph(){
            var nilai1 = $('#kelompokbebanpph').combobox('getValue');
            var url3 = 'get_spt2.php[not_found]?kelompok='+nilai1; // not found
            $('#no_spkbebanpph').combogrid('clear');
            $('#no_spkbebanpph').combogrid('grid').datagrid('reload',url3);
            $('#no_spkbebanpph').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionbebanpph(){
            var nilai1 = $('#kd_regionbebanpph').combobox('getValue');
            var nilai2 = $('#kelompokbebanpph').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1; // not found
            var url3 = 'get_spt2.php[not_found]?kd_region='+nilai1+'&kelompok='+nilai2;  // not found
            $('#kd_cabangbebanpph').combobox('enable');
            $('#kd_cabangbebanpph').combobox('clear'); 
            $('#kd_cabangbebanpph').combobox('reload',url2);
            $('#kd_cabangbebanpph').combobox('setValue','000');
            
            $('#no_spkbebanpph').combogrid('clear');
            $('#no_spkbebanpph').combogrid('grid').datagrid('reload',url2);
            $('#no_spkbebanpph').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangbebanpph(){
            var nilai1 = $('#kd_regionbebanpph').combobox('getValue');
            var nilai2 = $('#kd_cabangbebanpph').combobox('getValue');
            var nilai3 = $('#kelompokbebanpph').combobox('getValue');
            var url2 = 'get_spk2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2+'&kelompok='+nilai3; // not found
            $('#no_spkbebanpph').combogrid('clear');
            $('#no_spkbebanpph').combogrid('grid').datagrid('reload',url2);
            $('#no_spkbebanpph').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionbebanpph2(){
            var nilai1 = $('#kd_regionbebanpph2').combobox('getValue');
            var url2 = 'get_cabang2.php[not_found]?kd_region='+nilai1; // not found
            var url3 = 'get_unit2.php[not_found]?kd_region='+nilai1; // not found
            $('#kd_cabangbebanpph2').combobox('enable');
            $('#kd_cabangbebanpph2').combobox('clear'); 
            $('#kd_cabangbebanpph2').combobox('reload',url2);
            $('#kd_cabangbebanpph2').combobox('setValue','000');
            
            $('#kd_unitbebanpph2').combobox('enable');
            $('#kd_unitbebanpph2').combobox('clear'); 
            $('#kd_unitbebanpph2').combobox('reload',url3);
            $('#kd_unitbebanpph2').combobox('setValue','semua');
    	}
        
        function onSelectcabangbebanpph2(){
            var nilai1 = $('#kd_regionbebanpph2').combobox('getValue');
            var nilai2 = $('#kd_cabangbebanpph2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_region='+nilai1+'&kd_cabang='+nilai2; // not found
            $('#kd_unitbebanpph2').combobox('enable');
            $('#kd_unitbebanpph2').combobox('clear'); 
            $('#kd_unitbebanpph2').combobox('reload',url2);
            $('#kd_unitbebanpph2').combobox('setValue','semua');
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
        
        function onSelectblthbebanpphcari(){
            var nilai1 = $('#blthbebanpphcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectprojectbebanpph(){
            var nilai1 = $('#kd_projectbebanpph').combobox('getValue');
            var url2 = 'get_unit.php?kd_project='+nilai1;
            $('#kd_unitbebanpph').combobox('enable');
            $('#kd_unitbebanpph').combobox('clear'); 
            $('#kd_unitbebanpph').combobox('reload',url2);
    	}
        
        function onSelectprojectbebanpph2(){
            var nilai1 = $('#kd_projectbebanpph2').combobox('getValue');
            var url2 = 'get_unit2.php[not_found]?kd_project='+nilai1; // not found
            $('#kd_unitbebanpph2').combobox('enable');
            $('#kd_unitbebanpph2').combobox('clear'); 
            $('#kd_unitbebanpph2').combobox('reload',url2);
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
            var by2 = '<a href="javascript:void(0)" onclick="cetakform(\''+row.nipbebanpph+'|'+row.blthbebanpph+'\')" title="Form 1721-A1"><i class="fas fa-print fa-2x purple"></i></a>';
            return by2;
		}
    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgbebanpph").datagrid({
            onDblClickRow: function() {
                //editbebanpph();
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
    <table id="dgbebanpph" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_bebanpph.php" pageSize="20"        
    		toolbar="#toolbarbebanpph" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead frozen="true">
    		<tr>
    			<th field="nipbebanpph" width="140" sortable="true" align="center" halign="center">No Induk</th>
    			<th field="namabebanpph" width="140" sortable="true" align="left" halign="center">Nama Pegawai</th>
        </thead>
    	<thead>
    		<tr>
    			<!-- <th rowspan="2" field="nipbebanpph" width="140" sortable="true" align="center" halign="center">No Induk</th>
    			<th rowspan="2" field="namabebanpph" width="140" sortable="true" align="left" halign="center">Nama Pegawai</th> -->
    			<th rowspan="2" field="jabatanbebanpph" width="200" sortable="true" align="left" halign="center">Jabatan</th>
    			<th rowspan="2" field="statusbebanpph" width="80" sortable="true" align="center" halign="center">Status</th>
    			<th rowspan="2" field="npwpbebanpph" width="160" sortable="true" align="center" halign="center">NPWP</th>
    			<th rowspan="2" field="no_urutbebanpph" width="80" sortable="true" align="center" halign="center">No Urut</th>
    			<th rowspan="2" field="blthbebanpph" width="70" sortable="true" align="center" halign="center">Bulan<br />Pajak</th>
    			<th rowspan="2" field="blth_awalbebanpph" width="70" sortable="true" align="center" halign="center">BLTH<br/>Awal</th>
    			<th rowspan="2" field="blth_akhirbebanpph" width="70" sortable="true" align="center" halign="center">BLTH<br/>Akhir</th>
    			<th rowspan="2" field="masa_kerjabebanpph" width="60" sortable="true" align="center" halign="center">Jumlah<br/>Bulan</th>
    			<th rowspan="2" field="gajibebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Gaji</th>
    			<th rowspan="2" field="tunjangan_pphbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />PPh</th>
    			<th rowspan="2" field="tunjangan_variablebebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Tunjangan<br />Lainnya</th>
    			<th rowspan="2" field="honorariumbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Honorarium</th>
    			<th rowspan="2" field="benefitbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Benefit</th>
    			<th rowspan="2" field="natunabebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Natura</th>
                <th colspan="3"><span style="font-weight:bold;">Rutin (Bulan)</span></th>
                <th colspan="5"><span style="font-weight:bold;">Rutin (Disetahunkan)</span></th>
    			<th rowspan="2" field="bonus_thrbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Non Rutin</th>
                <th colspan="5"><span style="font-weight:bold;">Total (Rutin + Non Rutin)</span></th>
    			<th rowspan="2" field="nettot_sebelumnyabebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto Masa<br />Sebelumnya</th>
    			<th rowspan="2" field="nettot_akhirbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br />Untuk PKP</th>
    			<th rowspan="2" field="ptkpbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PTKP</th>
    			<th rowspan="2" field="pkpbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PKP</th>
    			<th rowspan="2" field="pphtbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh<br />Setahun</th>
    			<th rowspan="2" field="ppht_sebelumnyabebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Sudah<br />Dipotong</th>
    			<th rowspan="2" field="ppht_terutangbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">PPh Terutang<br />Setahun</th>
    			<th colspan="4">PPh Terutang Bulan Ini</th>
    			<!--<th field="tgl_proses2bebanpph" width="140" sortable="true" align="center" halign="center">Tgl Proses</th>-->
            </tr>
            <tr>
    			<th field="brutobbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatanbbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiunbbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>

    			<th field="brutotbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatantbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiuntbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>
    			<th field="biaya_pengurangtbebanpph" width="110" sortable="true" align="right" halign="center" formatter="formatrp2">B.Pengurang<br/>(4)</th>
    			<th field="nettotbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br/>(5)</th>

    			<th field="brutot_totalbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Bruto<br/>(1)</th>
    			<th field="biaya_jabatant_totalbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">B.Jabatan<br/>(2)</th>
    			<th field="iuran_pensiunt_totalbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Iuran Pensiun<br/>(3)</th>
    			<th field="biaya_pengurangt_totalbebanpph" width="110" sortable="true" align="right" halign="center" formatter="formatrp2">B.Pengurang<br/>(4)</th>
    			<th field="nettot_totalbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Netto<br/>(5)</th>

                <th field="pphb1_terutangbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Rutin</th>
                <th field="pphb2_terutangbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Non Rutin</th>
                <th field="pphb_terutangbebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Total</th>
                <th field="beban_pph21bebanpph" width="100" sortable="true" align="right" halign="center" formatter="formatrp2">Beban PPh</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarbebanpph">
    	<div id="tbbebanpph" style="padding:3px">
            <table>
            <tr>
                <td>BULAN</td>
                <td colspan="6">
                    <input class="easyui-datebox" id="blthbebanpphcari" name="blthbebanpphcari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>KPP</td>
                <td>
                    <input class="easyui-combobox"
                        id="kppbebanpphcari" editable="false"
                        name="kppbebanpphcari" value="SEMUA"
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
                    <input class="easyui-textbox" id="nipbebanpphcari" name="nipbebanpphcari" data-options="required:false,prompt:''" style="width: 200px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchbebanpph()" style="min-width:90px;">Search</a>                    
                </td>
            </tr>
            </table>
            <table>
            <tr>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-cog" plain="false" onclick="prosesbebanpph()" style="min-width:90px;">Proses Beban PPh</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" plain="false" onclick="resetbebanpph()" style="min-width:90px;">Reset Beban PPh</a></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" plain="false" onclick="downloadbebanpph()" style="min-width:90px;">Download Beban PPh</a></td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgbebanpph" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonsbebanpph">
    	<form id="fmbebanpph" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthbebanpph" name="blthbebanpph" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>KPP</td>
                <td>
                    <input class="easyui-combobox"
                        id="kppbebanpph" editable="false"
                        name="kppbebanpph" value="SEMUA"
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
                    <input class="easyui-textbox" id="nipbebanpph" name="nipbebanpph" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsbebanpph">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savebebanpph()" style="min-width:90px">Proses</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgbebanpph').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgbebanpph2" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonsbebanpph2">
    	<form id="fmbebanpph2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthbebanpph2" name="blthbebanpph2" value="" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>              
                <td style="white-space:nowrap;">NO INDUK</td>
                <td>        
                    <input class="easyui-textbox" id="nipbebanpph2" name="nipbebanpph2" data-options="required:false,prompt:'No Induk'" style="width: 260px;">
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsbebanpph2">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-reply" onclick="savebebanpph2()" style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgbebanpph2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgbebanpph3" class="easyui-dialog" modal="true" style="min-width:280px;min-height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonsbebanpph3">
    	<form id="fmbebanpph3" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthbebanpph3" name="blthbebanpph3" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipbebanpph3" name="nipbebanpph3" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsbebanpph3">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savebebanpph3()" style="width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgbebanpph3').dialog('close')" style="width:90px">Batal</a>
    </div>
    
    <div id="dlgbebanpph4" class="easyui-dialog" modal="true" style="width:280px;height:150px;padding:5px 5px" closed="true" buttons="#dlg-buttonsbebanpph4">
    	<form id="fmbebanpph4" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthbebanpph4" name="blthbebanpph4" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nipbebanpph4" name="nipbebanpph4" data-options="required:true" style="width: 140px;" readonly></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsbebanpph4">        
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-proses" onclick="savebebanpph4()" style="width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgbebanpph4').dialog('close')" style="width:90px">Batal</a>
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
        
    	function downloadbebanpph(){  
            var blthnya = $('#blthbebanpphcari').datebox('getValue');
            window.open("<?=$foldernya;?>download_bebanpph.php?blth="+blthnya,"_blank"); // not found
            
    	}

    	function prosesbebanpph(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            var kppnya = $("#kppbebanpphcari").combobox('getValue');
            var nipnya = $("#nipbebanpphcari").textbox('getValue');
    		$('#dlgbebanpph').dialog('open').dialog('setTitle','Proses Beban PPh');
    		$('#fmbebanpph').form('clear');
            $("#blthbebanpph").datebox('setValue', blthnya);
            $("#kppbebanpph").combobox('setValue', kppnya);
    		url = '<?=$foldernya;?>save_bebanpph.php';
    	}
    	function savebebanpph(){
            $.messager.progress({height:75, text:'Proses perhitungan Beban PPh'});            
    		$('#fmbebanpph').form('submit',{
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
    					$('#dlgbebanpph').dialog('close');
    					$('#dgbebanpph').datagrid('reload');
    				}
    			}
    		});
    	}
    	function resetbebanpph(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            var nipnya = $("#nipbebanpphcari").textbox('getValue');
    		$('#dlgbebanpph2').dialog('open').dialog('setTitle','Reset Beban PPh');
    		$('#fmbebanpph2').form('clear');
            $("#blthbebanpph2").datebox('setValue', blthnya);
            //$("#nipbebanpph2").textbox('setValue', nipnya);
    		url2 = '<?=$foldernya;?>reset_bebanpph.php';
    	}
    	function savebebanpph2(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Proses reset Beban PPh'});            
            		$('#fmbebanpph2').form('submit',{
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
            					$('#dlgbebanpph2').dialog('close');
            					$('#dgbebanpph').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function prosesbebanpph3(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            var nipnya = $("#nipbebanpphcari").textbox('getValue');
    		$('#dlgbebanpph3').dialog('open').dialog('setTitle','Proses bebanpphroll Perorangan');
    		$('#fmbebanpph3').form('clear');
            $("#blthbebanpph3").datebox('setValue', blthnya);
            $("#nipbebanpph3").textbox('setValue', nipnya);
    		url = 'save_bebanpph3.php'; // not found
    	}
    	function savebebanpph3(){
    		$('#fmbebanpph3').form('submit',{
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
    					$('#dlgbebanpph3').dialog('close');
    					$('#dgbebanpph').datagrid('reload');
    				}
    			}
    		});
    	}
    	function prosesbebanpph4(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            var nipnya = $("#nipbebanpphcari").textbox('getValue');
    		$('#dlgbebanpph4').dialog('open').dialog('setTitle','Reset bebanpphroll Perorangan');
    		$('#fmbebanpph4').form('clear');
            $("#blthbebanpph4").datebox('setValue', blthnya);
            $("#nipbebanpph4").textbox('setValue', nipnya);
    		url2 = 'save_bebanpph4.php'; // not found
    	}
    	function savebebanpph4(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
            		$('#fmbebanpph4').form('submit',{
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
            					$('#dlgbebanpph4').dialog('close');
            					$('#dgbebanpph').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editbebanpph(){
    		var row = $('#dgbebanpph').datagrid('getSelected');
    		if (row){
    			$('#dlgbebanpph3').dialog('open').dialog('setTitle','Proses bebanpphroll Per Pegawai');
                $('#fmbebanpph3').form('clear');
    			$('#fmbebanpph3').form('load',row);            
    			url = 'save_bebanpph3.php';// not found
    		}
    	}
    	function destroybebanpph(){
    		var row = $('#dgbebanpph').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus bebanpph "'+row.nama_bebanpph+'"?',function(r){
    				if (r){
    					$.post('destroy_bebanpph.php',{id:row.id},function(result){ // not found
    						if (result.success){
    							$('#dgbebanpph').datagrid('reload');
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
            var blthnya2 = $("#blthbebanpphcari").datebox('getValue');
            var kd_regionnya2 = $("#kd_regionbebanpphcari").combobox('getValue');
            var kd_cabangnya2 = $("#kd_cabangbebanpphcari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitbebanpphcari").combobox('getValue');
            
    		$('#dlgform2').dialog('open').dialog('setTitle','Form 1721-A1 Kolektif');
            $('#panelform2').prop('src','cetakform2.php?blth='+blthnya2+'&kd_region='+kd_regionnya2+'&kd_cabang='+kd_cabangnya2+'&kd_unit='+kd_unitnya2);
            
        }
        */
    	function cetakform2(){
            var ids = [];
            var rows = $('#dgbebanpph').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idbebanpph);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                //$('#dlgform2').dialog('open').dialog('setTitle','Form 1721-A1 Kolektif');
                //$('#panelform2').prop('src','cetakform2.php?ids2='+ids2);
                window.open('cetakform2.php?ids2='+ids2,'_blank'); 
            }
        }

    	function csvpph(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            var kelompoknya2 = $("#kelompokbebanpphcari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionbebanpphcari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangbebanpphcari").combobox('getValue');
            //window.open("exportcsv1721a1.php?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank");
            window.open("exportcsvmasa.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya,"_blank"); // not found
        }
        
    	function csv1721i(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            window.open("<?=$foldernya;?>exportcsvmasai.php?blth="+blthnya,"_blank");
        }
        
    	function lapspt(){
            var blthnya = $("#blthbebanpphcari").datebox('getValue');
            var kelompoknya2 = $("#kelompokbebanpphcari").combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
            var kd_regionnya = $("#kd_regionbebanpphcari").combobox('getValue');
            var kd_cabangnya = $("#kd_cabangbebanpphcari").combobox('getValue');
            //alert(kd_regionnya+" "+kd_cabangnya);
            window.open("lapspt.php[not_found]?blth="+blthnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya,"_blank"); // not found
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthbebanpphcari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectbebanpphcari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitbebanpphcari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenisbebanpphcari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategoribebanpphcari").combobox('getValue');
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_lategorinya2; // not found
            //var urlnya = 'cetaklist.php[not_found]?blth='+blthnya2+'&kd_regional='+kd_regionalnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2; // not found
            //alert(urlnya);
            //alert(blthnya2+" "+kd_regionalnya2+" "+kd_unitnya2+" "+kd_jenisnya2+" "+kd_kategorinya2);
    		$('#dlglist').dialog('open').dialog('setTitle','List Gaji');
            $('#panellist').prop('src','cetaklist.php[not_found]?blth='+blthnya2+'&kd_project='+kd_projectnya2+'&kd_unit='+kd_unitnya2+'&kd_jenis='+kd_jenisnya2+'&kd_kategori='+kd_kategorinya2); // not found
        }
        $("#dgbebanpph").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmbebanpph{
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
    	.fitembebanpph{
    		margin-bottom:5px;
    	}
    	.fitembebanpph label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitembebanpph input{
    		width:200px;
    	}
    	#fmbebanpph.numberbox input{
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