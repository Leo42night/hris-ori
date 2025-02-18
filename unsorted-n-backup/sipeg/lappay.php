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
    // include "koneksi_sipeg.php";
    ?>
    <script type="text/javascript">                     
		function doSearchlappay(){
            $('#dglappay').datagrid('load',{
				niplappaycari: $('#niplappaycari').textbox('getValue'),
				blthlappaycari: $('#blthlappaycari').datebox('getValue'),
			});
		}
        
        function onSelectkelompoklappaycari(){
            var nilai1 = $('#kelompoklappaycari').combobox('getValue');
            var nilai2 = $('#kd_regionlappaycari').combobox('getValue');
            var nilai3 = $('#kd_cabanglappaycari').combobox('getValue');
            var url1 = 'get_spklappaycari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spklappaycari').combogrid('clear');
            $('#no_spklappaycari').combogrid('grid').datagrid('reload',url1);
            $('#no_spklappaycari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionlappaycari(){
            var nilai1 = $('#kelompoklappaycari').combobox('getValue');
            var nilai2 = $('#kd_regionlappaycari').combobox('getValue');
            var nilai3 = $('#kd_cabanglappaycari').combobox('getValue');
            var url1 = 'get_spklappaycari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabanglappaycari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabanglappaycari').combobox('enable');
            $('#kd_cabanglappaycari').combobox('clear'); 
            $('#kd_cabanglappaycari').combobox('reload',url2);
            $('#kd_cabanglappaycari').combobox('setValue','000');

            $('#no_spklappaycari').combogrid('clear');
            $('#no_spklappaycari').combogrid('grid').datagrid('reload',url1);
            $('#no_spklappaycari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabanglappaycari(){
            var nilai1 = $('#kelompoklappaycari').combobox('getValue');
            var nilai2 = $('#kd_regionlappaycari').combobox('getValue');
            var nilai3 = $('#kd_cabanglappaycari').combobox('getValue');
            var url1 = 'get_spklappaycari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spklappaycari').combogrid('clear');
            $('#no_spklappaycari').combogrid('grid').datagrid('reload',url1);
            $('#no_spklappaycari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthlappaycari(){
            var nilai1 = $('#blthlappaycari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoklappay(){
            var nilai1 = $('#kelompoklappay').combobox('getValue');
            var nilai2 = $('#kd_regionlappay').combobox('getValue');
            var nilai3 = $('#kd_cabanglappay').combobox('getValue');
            var url1 = 'get_spklappay.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spklappay').combogrid('clear');
            $('#no_spklappay').combogrid('grid').datagrid('reload',url1);
            $('#no_spklappay').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionlappay(){
            var nilai1 = $('#kelompoklappay').combobox('getValue');
            var nilai2 = $('#kd_regionlappay').combobox('getValue');
            var nilai3 = $('#kd_cabanglappay').combobox('getValue');
            var url1 = 'get_spklappay.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabanglappay.php?kd_region='+nilai2;
            $('#kd_cabanglappay').combobox('enable');
            $('#kd_cabanglappay').combobox('clear'); 
            $('#kd_cabanglappay').combobox('reload',url2);
            $('#kd_cabanglappay').combobox('setValue','000');
			
            $('#no_spklappay').combogrid('clear');
            $('#no_spklappay').combogrid('grid').datagrid('reload',url1);
            $('#no_spklappay').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabanglappay(){
            var nilai1 = $('#kelompoklappay').combobox('getValue');
            var nilai2 = $('#kd_regionlappay').combobox('getValue');
            var nilai3 = $('#kd_cabanglappay').combobox('getValue');
            var url1 = 'get_spklappay.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spklappay').combogrid('clear');
            $('#no_spklappay').combogrid('grid').datagrid('reload',url1);
            $('#no_spklappay').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionlappay2(){
            var nilai1 = $('#kd_regionlappay2').combobox('getValue');
            var url2 = 'get_cabanglappay2.php?kd_region='+nilai1;
            $('#kd_cabanglappay2').combobox('enable');
            $('#kd_cabanglappay2').combobox('clear'); 
            $('#kd_cabanglappay2').combobox('reload',url2);
            $('#kd_cabanglappay2').combobox('setValue','000');
    	}
        
        function onSelectprojectlappay(){
            var nilai1 = $('#kd_projectlappay').combobox('getValue');
            var url2 = 'get_unitlappay.php?kd_project='+nilai1;
            $('#kd_unitlappay').combobox('enable');
            $('#kd_unitlappay').combobox('clear'); 
            $('#kd_unitlappay').combobox('reload',url2);
    	}
        
        function onSelectprojectlappay2(){
            var nilai1 = $('#kd_projectlappay2').combobox('getValue');
            var url2 = 'get_unitlappay2.php?kd_project='+nilai1;
            $('#kd_unitlappay2').combobox('enable');
            $('#kd_unitlappay2').combobox('clear'); 
            $('#kd_unitlappay2').combobox('reload',url2);
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

		function sliplappay(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niplappay+'|'+row.blthlappay+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dglappay").datagrid({
            onDblClickRow: function() {
                //editlappay();
            }
        });
    });
    </script>
    <table id="dglappay" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_lappay.php" pageSize="20"        
    		toolbar="#toolbarlappay" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="ck" checkbox="true"></th>
                <th rowspan="2" field="sliplappay" width="50" align="center" halign="center" data-options="formatter:sliplappay">Slip<br />Gaji</th>
    			<th rowspan="2" field="blthlappay" width="80" align="center" halign="center">BLTH</th>
    			<th rowspan="2" field="niplappay" width="100" align="center" halign="center">NIP</th>
    			<th rowspan="2" field="nama_lengkaplappay" width="200" align="left" halign="center">Nama</th>
                <th rowspan="2" field="jenislappay" width="140" align="center" halign="center">Jenis</th>
    			<th rowspan="2" field="gaji_dasarlappay" width="100" align="right" halign="center" formatter="formatrp2">Gaji Dasar</th>
    			<th rowspan="2" field="honorariumlappay" width="100" align="right" halign="center" formatter="formatrp2">Honorarium</th>
    			<th rowspan="2" field="honorerlappay" width="100" align="right" halign="center" formatter="formatrp2">Honor</th>
    			<th rowspan="2" field="tarif_gradelappay" width="100" align="right" halign="center" formatter="formatrp2">Tarif Grade P1</th>
    			<th rowspan="2" field="tunjangan_posisilappay" width="100" align="right" halign="center" formatter="formatrp2">P2-1A</th>
    			<th rowspan="2" field="p21blappay" width="100" align="right" halign="center" formatter="formatrp2">P2-1B</th>
    			<th rowspan="2" field="tunjangan_kemahalanlappay" width="100" align="right" halign="center" formatter="formatrp2">T.Lokasi</th>
    			<th rowspan="2" field="tunjangan_perumahanlappay" width="100" align="right" halign="center" formatter="formatrp2">T.Perumahan</th>
    			<th rowspan="2" field="tunjangan_transportasilappay" width="100" align="right" halign="center" formatter="formatrp2">T.Transportasi</th>
    			<th rowspan="2" field="bantuan_pulsalappay" width="100" align="right" halign="center" formatter="formatrp2">Bantuan Pulsa</th>
    			<th rowspan="2" field="tunjangan_kompetensilappay" width="100" align="right" halign="center" formatter="formatrp2">T.Kompetensi</th>
                <th colspan="4">Tunjangan Lainnya</th>
                <th rowspan="2" field="total_pendapatanlappay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerpendapatan">Total<br/>Pendapatan</th>
                <th colspan="7">Benefit yang dibayarkan perusahaan</th>
                <th rowspan="2" field="benefitlappay" width="100" align="right" halign="center"  data-options="formatter:formatrp2,styler:stylerbenefit">Total<br/>Benefit</th>
                <th rowspan="2" field="pendapatan_benefitlappay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerpendapatan">Pendapatan+<br/>Benefit</th>
                <th colspan="13">Potongan Pegawai</th>
                <th colspan="4">Potongan Lainnya</th>
                <th rowspan="2" field="total_potonganlappay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerpotongan">Total<br/>Potongan</th>
                <th rowspan="2" field="upah_bersihlappay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerupah">Jumlah<br/>Diterima</th>
    			<th rowspan="2" field="npwplappay" width="160" align="center" halign="center">NPWP</th>
    			<th rowspan="2" field="kpplappay" width="140" align="center" halign="center">KPP</th>
                <th rowspan="2" field="bank_lappayrolllappay" width="100" align="center" halign="center">Bank</th>
                <th rowspan="2" field="no_rek_lappayrolllappay" width="140" align="center" halign="center">Rekening</th>
                <th rowspan="2" field="an_lappayrolllappay" width="160" align="left" halign="center">Nama lappayroll</th>
    		</tr>
            <tr>
                <th field="tunjangan1lappay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (1)</th>
    			<th field="tunjangan2lappay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (2)</th>
    			<th field="tunjangan3lappay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (3)</th>
    			<th field="tunjangan4lappay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (4)</th>

    			<th field="dplk_perserolappay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Persero</th>
    			<th field="dplk_simponi_prlappay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Perushn</th>
    			<th field="bpjs_tk_pplappay" width="100" align="right" halign="center" formatter="formatrp2">JP</th>
    			<th field="bpjs_tk_kplappay" width="100" align="right" halign="center" formatter="formatrp2">JKM</th>
    			<th field="bpjs_tk_kkplappay" width="100" align="right" halign="center" formatter="formatrp2">JKK</th>
    			<th field="bpjs_tk_htplappay" width="100" align="right" halign="center" formatter="formatrp2">JHT</th>
                <th field="bpjs_kes_pplappay" width="100" align="right" halign="center" formatter="formatrp2">Kes</th>

                <th field="pot_koperasilappay" width="100" align="right" halign="center" formatter="formatrp2">Koperasi</th>
                <th field="pot_bazislappay" width="100" align="right" halign="center" formatter="formatrp2">Bazis</th>
                <th field="dplk_simponilappay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Simponi</th>
                <th field="pot_dplk_pribadilappay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Pribadi</th>
                <th field="cop_kendaraanlappay" width="100" align="right" halign="center" formatter="formatrp2">Cop Kendaraan</th>
                <th field="iuran_pesertalappay" width="100" align="right" halign="center" formatter="formatrp2">Iuran Peserta</th>
                <th field="brprlappay" width="100" align="right" halign="center" formatter="formatrp2">BRPR</th>
                <th field="sewa_messlappay" width="100" align="right" halign="center" formatter="formatrp2">Sewa Mess</th>
                <th field="qurbanlappay" width="100" align="right" halign="center" formatter="formatrp2">Qurban</th>
                <th field="arisanlappay" width="100" align="right" halign="center" formatter="formatrp2">Arisan</th>
                <th field="bpjs_tk_pklappay" width="100" align="right" halign="center" formatter="formatrp2">JP</th>
                <th field="bpjs_tk_jhtklappay" width="100" align="right" halign="center" formatter="formatrp2">JHT</th>
                <th field="bpjs_kes_pklappay" width="100" align="right" halign="center" formatter="formatrp2">Kes</th>

                <th field="potongan1lappay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (1)</th>
    			<th field="potongan2lappay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (2)</th>
    			<th field="potongan3lappay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (3)</th>
    			<th field="potongan4lappay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (4)</th>

            </tr>
    	</thead>
    </table>
    
    <div id="toolbarlappay">
    	<div id="tblappay" style="padding:3px">
            <table>
            <tr>
                <td>BLTH</td>
                <td>
                    <input class="easyui-datebox" id="blthlappaycari" name="blthlappaycari" value="<?=date('Y-m');?>" editable="false" data-options="onSelect:onSelectblthlappaycari,required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niplappaycari" name="niplappaycari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchlappay()" style="min-width:90px;">Search</a>
                    <!-- <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="proseslappay()" style="min-width:90px;">Proses Gaji</a>
    	            <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resetlappay()" style="min-width:90px;">Reset Gaji</a>                     -->
                    <!--<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="downloadlappay()" style="min-width:90px;">Download lappayroll</a>-->
                </td>
            </tr>
            </table>
    	</div>		
        <!-- <a href="#" class="easyui-linkbutton c1" plain="true" iconCls="fa fa-print" onclick="cetakslip2()" style="min-width:90px;">Slip Kolektif</a> -->
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-file-excel" onclick="gajipegawai()" style="min-width:90px;">Gaji Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-file-excel" onclick="potpegawai()" style="min-width:90px;">Potongan Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="gajihonor()" style="min-width:90px;margin-left:10px;">Gaji Honorarium</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="pothonor()" style="min-width:90px;">Potongan Honorarium</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-file-excel" onclick="gajirekap()" style="min-width:90px;margin-left:10px;">Rekapitulasi</a>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-file-excel" onclick="potpegawai()" style="min-width:90px;">Potongan Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-file-excel" onclick="pothonor()" style="min-width:90px;">Potongan Honor</a>
        -->
        <!--
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="proseslappay2()" style="min-width:90px;">Reset Gaji Kolektif</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="proseslappay3()" style="min-width:90pcx;">Proses Gaji Perorangan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="proseslappay4()" style="min-width:90px;">Reset Gaji Perorangan</a>
        -->
    </div>
    <!--
    <div id="dlglappay" class="easyui-dialog" modal="true" style="min-width:370px;min-height:200px;padding:5px 5px" closed="true" buttons="#dlg-buttonslappay">
    	<form id="fmlappay" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthlappay" name="blthlappay" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
			<tr>
                <td>KELOMPOK</td>
                <td>
                    <select id="kelompoklappay" name="kelompoklappay" class="easyui-combobox" editable="false" data-options="onSelect:onSelectkelompoklappay,required:true,panelHeight:'auto'" style="width: 260px;">
                        <option value="SEMUA" selected>SEMUA</option>
                        <option value="TEKNIK">TEKNIK</option>
                        <option value="NON TEKNIK">NON TEKNIK</option>
                    </select>                            
                </td>
			</tr>
            <tr>
                <td>REGION</td>
                <td>
                    <input class="easyui-combobox"
                        id="kd_regionlappay" editable="false"
                        name="kd_regionlappay"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            onSelect:onSelectregionlappay,
                            url:'get_regionlappay.php',
                            required:true,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'160px'
            		">
                </td>
            </tr>
            <tr>
                <td>CABANG</td>
                <td>                    
                    <input class="easyui-combobox"
                        id="kd_cabanglappay" editable="false"
                        name="kd_cabanglappay" missingMessage="Harus di isi"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            onSelect:onSelectcabanglappay,
        					url:'get_cabanglappay.php',
                            required:true,
        					method:'get',
        					valueField:'value',
        					textField:'text',
        					panelHeight:'160px'
        			">                    
                </td>
            </tr>
			<tr>
				<td>NO SPK</td>
                <td>
                    <select id="no_spklappay" name="no_spklappay" editable="true" class="easyui-combogrid" style="width:260px;" value="SEMUA" data-options="
                            panelWidth: 600,                            
                			multiple: true,
                            required:false,
                            multiline:true,
                            nowrap:false,                            
                			idField: 'value',
                			textField: 'value',
                			url: 'get_spklappay.php',
                			method: 'get',
                			columns: [[
                				{id:'col1', field:'ck',checkbox:true},
                				{id:'col1', field:'value',title:'No SPK',width:200},
                				{id:'col1', field:'text',title:'Uraian Pekerjaan',width:400}
                			]],
                			fitColumns: true
                		">
                	</select>'
                </td>
			</tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonslappay">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savelappay()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlglappay').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlglappay2" class="easyui-dialog" modal="true" style="width:370px;height:260px;padding:5px 5px" closed="true" buttons="#dlg-buttonslappay2">
    	<form id="fmlappay2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthlappay2" name="blthlappay2" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
			<tr>
                <td>KELOMPOK</td>
                <td>
                    <select id="kelompoklappay2" name="kelompoklappay2" class="easyui-combobox" editable="false" data-options="onSelect:onSelectkelompoklappay,required:true,panelHeight:'auto'" style="width: 260px;">
                        <option value="SEMUA" selected>SEMUA</option>
                        <option value="TEKNIK">TEKNIK</option>
                        <option value="NON TEKNIK">NON TEKNIK</option>
                    </select>                            
                </td>
			</tr>
            <tr>
                <td>REGION</td>
                <td>
                    <input class="easyui-combobox"
                        id="kd_regionlappay2" editable="false"
                        name="kd_regionlappay2"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            onSelect:onSelectregionlappay2,
                            url:'get_regionlappay2.php',
                            required:true,
            				method:'get',
            				valueField:'value',
            				textField:'text',
            				panelHeight:'160px'
            		">
                </td>
            </tr>
            <tr>
                <td>CABANG</td>
                <td>                    
                    <input class="easyui-combobox"
                        id="kd_cabanglappay2" editable="false"
                        name="kd_cabanglappay2" missingMessage="Harus di isi"
                        style="padding: 2px; width: 260px;" 
                        data-options="
        					url:'get_cabanglappay2.php',
                            required:true,
        					method:'get',
        					valueField:'value',
        					textField:'text',
        					panelHeight:'160px'
        			">                    
                </td>
            </tr>
			<tr>
				<td>NO SPK</td>
                <td>
                    <select id="no_spklappay2" name="no_spklappay2" editable="true" class="easyui-combogrid" style="width:260px;" value="SEMUA" data-options="
                            panelWidth: 600,                            
                			multiple: true,
                            required:false,
                            multiline:true,
                            nowrap:false,                            
                			idField: 'value',
                			textField: 'value',
                			url: 'get_spklappay.php',
                			method: 'get',
                			columns: [[
                				{id:'col1', field:'ck',checkbox:true},
                				{id:'col1', field:'value',title:'No SPK',width:200},
                				{id:'col1', field:'text',title:'Uraian Pekerjaan',width:400}
                			]],
                			fitColumns: true
                		">
                	</select>'
                </td>
			</tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonslappay2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savelappay2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlglappay2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlglappay3" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonslappay3">
    	<form id="fmlappay3" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthlappay3" name="blthlappay3" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="niplappay3" name="niplappay3" data-options="required:true" style="width: 140px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonslappay3">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savelappay3()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlglappay3').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlglappay4" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonslappay4">
    	<form id="fmlappay4" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
			<tr>
                <td>KELOMPOK</td>
                <td>
                    <select id="kelompoklappay4" name="kelompoklappay4" class="easyui-combobox" editable="false" data-options="required:true,panelHeight:'auto'" style="width: 120px;">
                        <?php if($kelompokloginsipeg=="SEMUA"){?>
                        <option value="SEMUA" selected>SEMUA</option>
                        <option value="TEKNIK">TEKNIK</option>
                        <option value="NON TEKNIK">NON TEKNIK</option>
                        <?php } else {?>
                        <option value="<?=$kelompokloginsipeg;?>" selected><?=$kelompokloginsipeg;?></option>
                        <?php } ?>
                    </select>                            
                </td>
			</tr>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthlappay4" name="blthlappay4" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="niplappay4" name="niplappay4" data-options="required:true" style="width: 140px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonslappay4">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savelappay4()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlglappay4').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgslip" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true" buttons="">
        <iframe id="panelslip" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>
    
    <div id="dlgslip2" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true" buttons="">
        <iframe id="panelslip2" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>
    
    <div id="dlglist" class="easyui-dialog" modal="true" style="width:1200px;height:600px;padding:0px;" closed="true" buttons="">
        <iframe id="panellist" src="#" style="width: 100%; height: 550px; border: none;"></iframe>
    </div>
    -->
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
    	function proseslappay(){
            var blthnya = $("#blthlappaycari").datebox('getValue');
            $.messager.confirm('Konfirmasi','Proses lappayroll bulan : "'+blthnya+'"?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses lappayroll'});
                    $.post('<?=$foldernya;?>save_lappay.php',{blth:blthnya},function(result){
                        //alert(result);
                        $.messager.progress('close');
                        $('#dglappay').datagrid('reload');
                        $.messager.alert('Result',result.errorMsg,'info');
                    },'json');
                }
            });
    	}
    	function resetlappay(){
            var blthnya = $("#blthlappaycari").datebox('getValue');
            $.messager.confirm('Konfirmasi','Reset lappayroll bulan : "'+blthnya+'"?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses lappayroll'});
                    $.post('<?=$foldernya;?>reset_lappay.php',{blth:blthnya},function(result){
                        //alert(result);
                        $.messager.progress('close');
                        if (result.success){
                            $('#dglappay').datagrid('reload');
                        } else {
                            $.messager.alert('Error',result.errorMsg,'error');
                        }
                    },'json');
                }
            });
    	}
        function downloadlappay(){
            var blthnya = $('#blthlappaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_lappayroll.php?blth="+blthnya,"_blank");
        }
        /*
    	function savelappay(){
            $.messager.progress({height:75, text:'Proses lappayroll'});
            $('#dlglappay').dialog('close');
			var spknya = $('#no_spklappay').combogrid('getValues').join('|');
            $('#fmlappay').form('submit',{
                url: url+'&spknya='+spknya,
                onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
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
                        $('#dlglappay').dialog('close');
                        $('#dglappay').datagrid('reload');
                    }
                }
            });
    	}
    	function proseslappay2(){
            var blthnya = $("#blthlappaycari").datebox('getValue');
    		$('#dlglappay2').dialog('open').dialog('setTitle','Reset lappayroll Kolektif');
    		$('#fmlappay2').form('clear');
            $("#blthlappay2").datebox('setValue', blthnya);
    		url2 = 'save_lappay2.php';
    	}
    	function savelappay2(){
			var spknya = $('#no_spklappay2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset lappayroll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset lappayroll'});
                    $('#dlglappay2').dialog('close');
            		$('#fmlappay2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlglappay2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlglappay2').dialog('close');
            					$('#dglappay').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function proseslappay3(){
            var blthnya = $("#blthlappaycari").datebox('getValue');
            var nipnya = $("#niplappaycari").textbox('getValue');
    		$('#dlglappay3').dialog('open').dialog('setTitle','Proses lappayroll Perorangan');
    		$('#fmlappay3').form('clear');
            $("#blthlappay3").datebox('setValue', blthnya);
            $("#niplappay3").textbox('setValue', nipnya);
    		url = 'save_lappay3.php';
    	}
    	function savelappay3(){
    		$('#fmlappay3').form('submit',{
    			url: url,
    			onSubmit: function(){
                    return $(this).form('enableValidation').form('validate');
    			},
    			success: function(result){
                    //alert(result);    			 
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlglappay3').dialog('close');
    					$('#dglappay').datagrid('reload');
    				}
    			}
    		});
    	}
    	function proseslappay4(){
            var kelompoknya = $("#kelompoklappaycari").combobox('getValue');
            var blthnya = $("#blthlappaycari").datebox('getValue');
            var nipnya = $("#niplappaycari").textbox('getValue');
    		$('#dlglappay4').dialog('open').dialog('setTitle','Reset lappayroll Perorangan');
    		$('#fmlappay4').form('clear');
            $("#blthlappay4").datebox('setValue', blthnya);
            $("#niplappay4").textbox('setValue', nipnya);
    		url2 = 'save_lappay4.php';
    	}
    	function savelappay4(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
            		$('#fmlappay4').form('submit',{
            			url: url2,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    			 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlglappay4').dialog('close');
            					$('#dglappay').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editlappay(){
    		var row = $('#dglappay').datagrid('getSelected');
    		if (row){
    			$('#dlglappay3').dialog('open').dialog('setTitle','Proses lappayroll Per Pegawai');
                $('#fmlappay3').form('clear');
    			$('#fmlappay3').form('load',row);            
    			url = 'save_lappay3.php';
    		}
    	}
    	function destroylappay(){
    		var row = $('#dglappay').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus lappay "'+row.nama_lappay+'"?',function(r){
    				if (r){
    					$.post('destroy_lappay.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dglappay').datagrid('reload');
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
            var rows = $('#dglappay').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idlappay);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthlappaycari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectlappaycari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitlappaycari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenislappaycari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategorilappaycari").combobox('getValue');
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
            var blthnya = $("#blthlappaycari").datebox('getValue');
            var ids = [];
            var rows = $('#dglappay').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idlappay);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function gajipegawai(){
            var blthnya = $('#blthlappaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function potpegawai(){
            var blthnya = $('#blthlappaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_potpegawai.php?blth="+blthnya,"_blank");
        }

        function gajihonor(){
            var blthnya = $('#blthlappaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function pothonor(){
            var blthnya = $('#blthlappaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_pothonor.php?blth="+blthnya,"_blank");
        }

        function gajirekap(){
            var blthnya = $('#blthlappaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        
        
        $("#dglappay").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmlappay{
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
    	.fitemlappay{
    		margin-bottom:5px;
    	}
    	.fitemlappay label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemlappay input{
    		width:200px;
    	}
    	#fmlappay.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>