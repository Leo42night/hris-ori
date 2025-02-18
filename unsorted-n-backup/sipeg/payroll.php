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
		function doSearchpay(){
            $('#dgpay').datagrid('load',{
				nippaycari: $('#nippaycari').textbox('getValue'),
				blthpaycari: $('#blthpaycari').datebox('getValue'),
			});
		}
        
        function onSelectkelompokpaycari(){
            var nilai1 = $('#kelompokpaycari').combobox('getValue');
            var nilai2 = $('#kd_regionpaycari').combobox('getValue');
            var nilai3 = $('#kd_cabangpaycari').combobox('getValue');
            var url1 = 'get_spkpaycari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkpaycari').combogrid('clear');
            $('#no_spkpaycari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkpaycari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionpaycari(){
            var nilai1 = $('#kelompokpaycari').combobox('getValue');
            var nilai2 = $('#kd_regionpaycari').combobox('getValue');
            var nilai3 = $('#kd_cabangpaycari').combobox('getValue');
            var url1 = 'get_spkpaycari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangpaycari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangpaycari').combobox('enable');
            $('#kd_cabangpaycari').combobox('clear'); 
            $('#kd_cabangpaycari').combobox('reload',url2);
            $('#kd_cabangpaycari').combobox('setValue','000');

            $('#no_spkpaycari').combogrid('clear');
            $('#no_spkpaycari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkpaycari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangpaycari(){
            var nilai1 = $('#kelompokpaycari').combobox('getValue');
            var nilai2 = $('#kd_regionpaycari').combobox('getValue');
            var nilai3 = $('#kd_cabangpaycari').combobox('getValue');
            var url1 = 'get_spkpaycari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkpaycari').combogrid('clear');
            $('#no_spkpaycari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkpaycari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthpaycari(){
            var nilai1 = $('#blthpaycari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompokpay(){
            var nilai1 = $('#kelompokpay').combobox('getValue');
            var nilai2 = $('#kd_regionpay').combobox('getValue');
            var nilai3 = $('#kd_cabangpay').combobox('getValue');
            var url1 = 'get_spkpay.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkpay').combogrid('clear');
            $('#no_spkpay').combogrid('grid').datagrid('reload',url1);
            $('#no_spkpay').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionpay(){
            var nilai1 = $('#kelompokpay').combobox('getValue');
            var nilai2 = $('#kd_regionpay').combobox('getValue');
            var nilai3 = $('#kd_cabangpay').combobox('getValue');
            var url1 = 'get_spkpay.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangpay.php?kd_region='+nilai2;
            $('#kd_cabangpay').combobox('enable');
            $('#kd_cabangpay').combobox('clear'); 
            $('#kd_cabangpay').combobox('reload',url2);
            $('#kd_cabangpay').combobox('setValue','000');
			
            $('#no_spkpay').combogrid('clear');
            $('#no_spkpay').combogrid('grid').datagrid('reload',url1);
            $('#no_spkpay').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangpay(){
            var nilai1 = $('#kelompokpay').combobox('getValue');
            var nilai2 = $('#kd_regionpay').combobox('getValue');
            var nilai3 = $('#kd_cabangpay').combobox('getValue');
            var url1 = 'get_spkpay.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spkpay').combogrid('clear');
            $('#no_spkpay').combogrid('grid').datagrid('reload',url1);
            $('#no_spkpay').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionpay2(){
            var nilai1 = $('#kd_regionpay2').combobox('getValue');
            var url2 = 'get_cabangpay2.php?kd_region='+nilai1;
            $('#kd_cabangpay2').combobox('enable');
            $('#kd_cabangpay2').combobox('clear'); 
            $('#kd_cabangpay2').combobox('reload',url2);
            $('#kd_cabangpay2').combobox('setValue','000');
    	}
        
        function onSelectprojectpay(){
            var nilai1 = $('#kd_projectpay').combobox('getValue');
            var url2 = 'get_unitpay.php?kd_project='+nilai1;
            $('#kd_unitpay').combobox('enable');
            $('#kd_unitpay').combobox('clear'); 
            $('#kd_unitpay').combobox('reload',url2);
    	}
        
        function onSelectprojectpay2(){
            var nilai1 = $('#kd_projectpay2').combobox('getValue');
            var url2 = 'get_unitpay2.php?kd_project='+nilai1;
            $('#kd_unitpay2').combobox('enable');
            $('#kd_unitpay2').combobox('clear'); 
            $('#kd_unitpay2').combobox('reload',url2);
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

		function slippay(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.nippay+'|'+row.blthpay+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgpay").datagrid({
            onDblClickRow: function() {
                //editpay();
            }
        });
    });
    </script>
    <table id="dgpay" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_pay.php" pageSize="20"        
    		toolbar="#toolbarpay" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="ck" checkbox="true"></th>
                <th rowspan="2" field="slippay" width="50" align="center" halign="center" data-options="formatter:slippay">Slip<br />Gaji</th>
    			<th rowspan="2" field="blthpay" width="80" align="center" halign="center">BLTH</th>
    			<th rowspan="2" field="nippay" width="100" align="center" halign="center">NIP</th>
    			<th rowspan="2" field="nama_lengkappay" width="200" align="left" halign="center">Nama</th>
                <th rowspan="2" field="jenispay" width="140" align="center" halign="center">Jenis</th>
    			<th rowspan="2" field="gaji_dasarpay" width="100" align="right" halign="center" formatter="formatrp2">Gaji Dasar</th>
    			<th rowspan="2" field="honorariumpay" width="100" align="right" halign="center" formatter="formatrp2">Honorarium</th>
    			<th rowspan="2" field="honorerpay" width="100" align="right" halign="center" formatter="formatrp2">Honor</th>
    			<th rowspan="2" field="tarif_gradepay" width="100" align="right" halign="center" formatter="formatrp2">Tarif Grade P1</th>
    			<th rowspan="2" field="tunjangan_posisipay" width="100" align="right" halign="center" formatter="formatrp2">P2-1A</th>
    			<th rowspan="2" field="p21bpay" width="100" align="right" halign="center" formatter="formatrp2">P2-1B</th>
    			<th rowspan="2" field="tunjangan_kemahalanpay" width="100" align="right" halign="center" formatter="formatrp2">T.Lokasi</th>
    			<th rowspan="2" field="tunjangan_perumahanpay" width="100" align="right" halign="center" formatter="formatrp2">T.Perumahan</th>
    			<th rowspan="2" field="tunjangan_transportasipay" width="100" align="right" halign="center" formatter="formatrp2">T.Transportasi</th>
    			<th rowspan="2" field="bantuan_pulsapay" width="100" align="right" halign="center" formatter="formatrp2">Bantuan Pulsa</th>
    			<th rowspan="2" field="tunjangan_kompetensipay" width="100" align="right" halign="center" formatter="formatrp2">T.Kompetensi</th>
                <th colspan="4">Tunjangan Lainnya</th>
                <th rowspan="2" field="total_pendapatanpay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerpendapatan">Total<br/>Pendapatan</th>
                <th colspan="7">Benefit yang dibayarkan perusahaan</th>
                <th rowspan="2" field="benefitpay" width="100" align="right" halign="center"  data-options="formatter:formatrp2,styler:stylerbenefit">Total<br/>Benefit</th>
                <th rowspan="2" field="pendapatan_benefitpay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerpendapatan">Pendapatan+<br/>Benefit</th>
                <th colspan="13">Potongan Pegawai</th>
                <th colspan="4">Potongan Lainnya</th>
                <th rowspan="2" field="total_potonganpay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerpotongan">Total<br/>Potongan</th>
                <th rowspan="2" field="upah_bersihpay" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:stylerupah">Jumlah<br/>Diterima</th>
    			<th rowspan="2" field="npwppay" width="160" align="center" halign="center">NPWP</th>
    			<th rowspan="2" field="kpppay" width="140" align="center" halign="center">KPP</th>
                <th rowspan="2" field="bank_payrollpay" width="100" align="center" halign="center">Bank</th>
                <th rowspan="2" field="no_rek_payrollpay" width="140" align="center" halign="center">Rekening</th>
                <th rowspan="2" field="an_payrollpay" width="160" align="left" halign="center">Nama Payroll</th>
    		</tr>
            <tr>
                <th field="tunjangan1pay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (1)</th>
    			<th field="tunjangan2pay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (2)</th>
    			<th field="tunjangan3pay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (3)</th>
    			<th field="tunjangan4pay" width="100" align="right" halign="center" formatter="formatrp2">Tunjangan (4)</th>

    			<th field="dplk_perseropay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Persero</th>
    			<th field="dplk_simponi_prpay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Perushn</th>
    			<th field="bpjs_tk_pppay" width="100" align="right" halign="center" formatter="formatrp2">JP</th>
    			<th field="bpjs_tk_kppay" width="100" align="right" halign="center" formatter="formatrp2">JKM</th>
    			<th field="bpjs_tk_kkppay" width="100" align="right" halign="center" formatter="formatrp2">JKK</th>
    			<th field="bpjs_tk_htppay" width="100" align="right" halign="center" formatter="formatrp2">JHT</th>
                <th field="bpjs_kes_pppay" width="100" align="right" halign="center" formatter="formatrp2">Kes</th>

                <th field="pot_koperasipay" width="100" align="right" halign="center" formatter="formatrp2">Koperasi</th>
                <th field="pot_bazispay" width="100" align="right" halign="center" formatter="formatrp2">Bazis</th>
                <th field="dplk_simponipay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Simponi</th>
                <th field="pot_dplk_pribadipay" width="100" align="right" halign="center" formatter="formatrp2">DPLK Pribadi</th>
                <th field="cop_kendaraanpay" width="100" align="right" halign="center" formatter="formatrp2">Cop Kendaraan</th>
                <th field="iuran_pesertapay" width="100" align="right" halign="center" formatter="formatrp2">Iuran Peserta</th>
                <th field="brprpay" width="100" align="right" halign="center" formatter="formatrp2">BRPR</th>
                <th field="sewa_messpay" width="100" align="right" halign="center" formatter="formatrp2">Sewa Mess</th>
                <th field="qurbanpay" width="100" align="right" halign="center" formatter="formatrp2">Qurban</th>
                <th field="arisanpay" width="100" align="right" halign="center" formatter="formatrp2">Arisan</th>
                <th field="bpjs_tk_pkpay" width="100" align="right" halign="center" formatter="formatrp2">JP</th>
                <th field="bpjs_tk_jhtkpay" width="100" align="right" halign="center" formatter="formatrp2">JHT</th>
                <th field="bpjs_kes_pkpay" width="100" align="right" halign="center" formatter="formatrp2">Kes</th>

                <th field="potongan1pay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (1)</th>
    			<th field="potongan2pay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (2)</th>
    			<th field="potongan3pay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (3)</th>
    			<th field="potongan4pay" width="100" align="right" halign="center" formatter="formatrp2">Potongan (4)</th>

            </tr>
    	</thead>
    </table>
    
    <div id="toolbarpay">
    	<div id="tbpay" style="padding:3px">
            <table>
            <tr>
                <td>BLTH</td>
                <td>
                    <input class="easyui-datebox" id="blthpaycari" name="blthpaycari" value="<?=date('Y-m');?>" editable="false" data-options="onSelect:onSelectblthpaycari,required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nippaycari" name="nippaycari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchpay()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosespay()" style="min-width:90px;">Proses Gaji</a>
    	            <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="resetpay()" style="min-width:90px;">Reset Gaji</a>                    
                    <!--<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="downloadpay()" style="min-width:90px;">Download Payroll</a>-->
                </td>
            </tr>
            </table>
    	</div>		
        <a href="#" class="easyui-linkbutton c1" plain="true" iconCls="fa fa-print" onclick="cetakslip2()" style="min-width:90px;">Slip Kolektif</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="downloadpay()" style="min-width:90px;margin-left:10px;">Download Payroll</a>
        <!-- <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="gajipegawai()" style="min-width:90px;margin-left:10px;">Gaji Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="gajihonor()" style="min-width:90px;">Gaji Honor</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-file-excel" onclick="gajirekap()" style="min-width:90px;">Rekapitulasi</a> -->
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-file-excel" onclick="potpegawai()" style="min-width:90px;">Potongan Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-file-excel" onclick="pothonor()" style="min-width:90px;">Potongan Honor</a>
        -->
        <!--
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="prosespay2()" style="min-width:90px;">Reset Gaji Kolektif</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="prosespay3()" style="min-width:90pcx;">Proses Gaji Perorangan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-reply" onclick="prosespay4()" style="min-width:90px;">Reset Gaji Perorangan</a>
        -->
    </div>
    <!--
    <div id="dlgpay" class="easyui-dialog" modal="true" style="min-width:370px;min-height:200px;padding:5px 5px" closed="true" buttons="#dlg-buttonspay">
    	<form id="fmpay" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthpay" name="blthpay" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
			<tr>
                <td>KELOMPOK</td>
                <td>
                    <select id="kelompokpay" name="kelompokpay" class="easyui-combobox" editable="false" data-options="onSelect:onSelectkelompokpay,required:true,panelHeight:'auto'" style="width: 260px;">
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
                        id="kd_regionpay" editable="false"
                        name="kd_regionpay"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            onSelect:onSelectregionpay,
                            url:'get_regionpay.php',
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
                        id="kd_cabangpay" editable="false"
                        name="kd_cabangpay" missingMessage="Harus di isi"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            onSelect:onSelectcabangpay,
        					url:'get_cabangpay.php',
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
                    <select id="no_spkpay" name="no_spkpay" editable="true" class="easyui-combogrid" style="width:260px;" value="SEMUA" data-options="
                            panelWidth: 600,                            
                			multiple: true,
                            required:false,
                            multiline:true,
                            nowrap:false,                            
                			idField: 'value',
                			textField: 'value',
                			url: 'get_spkpay.php',
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
    <div id="dlg-buttonspay">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savepay()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpay').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpay2" class="easyui-dialog" modal="true" style="width:370px;height:260px;padding:5px 5px" closed="true" buttons="#dlg-buttonspay2">
    	<form id="fmpay2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthpay2" name="blthpay2" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
			<tr>
                <td>KELOMPOK</td>
                <td>
                    <select id="kelompokpay2" name="kelompokpay2" class="easyui-combobox" editable="false" data-options="onSelect:onSelectkelompokpay,required:true,panelHeight:'auto'" style="width: 260px;">
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
                        id="kd_regionpay2" editable="false"
                        name="kd_regionpay2"
                        style="padding: 2px; width: 260px;" 
                        data-options="
                            onSelect:onSelectregionpay2,
                            url:'get_regionpay2.php',
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
                        id="kd_cabangpay2" editable="false"
                        name="kd_cabangpay2" missingMessage="Harus di isi"
                        style="padding: 2px; width: 260px;" 
                        data-options="
        					url:'get_cabangpay2.php',
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
                    <select id="no_spkpay2" name="no_spkpay2" editable="true" class="easyui-combogrid" style="width:260px;" value="SEMUA" data-options="
                            panelWidth: 600,                            
                			multiple: true,
                            required:false,
                            multiline:true,
                            nowrap:false,                            
                			idField: 'value',
                			textField: 'value',
                			url: 'get_spkpay.php',
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
    <div id="dlg-buttonspay2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savepay2()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpay2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpay3" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonspay3">
    	<form id="fmpay3" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>BLTH</td>
                <td><input class="easyui-datebox" id="blthpay3" name="blthpay3" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nippay3" name="nippay3" data-options="required:true" style="width: 140px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspay3">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savepay3()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpay3').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpay4" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;padding:5px 5px" closed="true" buttons="#dlg-buttonspay4">
    	<form id="fmpay4" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
			<tr>
                <td>KELOMPOK</td>
                <td>
                    <select id="kelompokpay4" name="kelompokpay4" class="easyui-combobox" editable="false" data-options="required:true,panelHeight:'auto'" style="width: 120px;">
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
                <td><input class="easyui-datebox" id="blthpay4" name="blthpay4" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>NOMOR INDUK</td>
                <td><input class="easyui-textbox" id="nippay4" name="nippay4" data-options="required:true" style="width: 140px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspay4">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-cog" onclick="savepay4()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpay4').dialog('close')" style="min-width:90px">Batal</a>
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
    	function prosespay(){
            var blthnya = $("#blthpaycari").datebox('getValue');
            $.messager.confirm('Konfirmasi','Proses payroll bulan : "'+blthnya+'"?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses Payroll'});
                    $.post('<?=$foldernya;?>save_pay.php',{blth:blthnya},function(result){
                        //alert(result);
                        $.messager.progress('close');
                        $('#dgpay').datagrid('reload');
                        $.messager.alert('Result',result.errorMsg,'info');
                    },'json');
                }
            });
    	}
    	function resetpay(){
            var blthnya = $("#blthpaycari").datebox('getValue');
            $.messager.confirm('Konfirmasi','Reset payroll bulan : "'+blthnya+'"?',function(r){
                if (r){
                    $.messager.progress({height:75, text:'Proses Payroll'});
                    $.post('<?=$foldernya;?>reset_pay.php',{blth:blthnya},function(result){
                        //alert(result);
                        $.messager.progress('close');
                        if (result.success){
                            $('#dgpay').datagrid('reload');
                        } else {
                            $.messager.alert('Error',result.errorMsg,'error');
                        }
                    },'json');
                }
            });
    	}
        function downloadpay(){
            var blthnya = $('#blthpaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_payroll.php?blth="+blthnya,"_blank");
        }
        /*
    	function savepay(){
            $.messager.progress({height:75, text:'Proses Payroll'});
            $('#dlgpay').dialog('close');
			var spknya = $('#no_spkpay').combogrid('getValues').join('|');
            $('#fmpay').form('submit',{
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
                        $('#dlgpay').dialog('close');
                        $('#dgpay').datagrid('reload');
                    }
                }
            });
    	}
    	function prosespay2(){
            var blthnya = $("#blthpaycari").datebox('getValue');
    		$('#dlgpay2').dialog('open').dialog('setTitle','Reset Payroll Kolektif');
    		$('#fmpay2').form('clear');
            $("#blthpay2").datebox('setValue', blthnya);
    		url2 = 'save_pay2.php';
    	}
    	function savepay2(){
			var spknya = $('#no_spkpay2').combogrid('getValues').join('|');
			$.messager.confirm('Konfirmasi','Yakin reset payroll?',function(r){
				if (r){
                    $.messager.progress({height:75, text:'Reset Payroll'});
                    $('#dlgpay2').dialog('close');
            		$('#fmpay2').form('submit',{
            			url: url2+'?spknya='+spknya,
            			onSubmit: function(){
                            return $(this).form('enableValidation').form('validate');
            			},
            			success: function(result){
                            //alert(result);    	
                            $.messager.progress('close');
                            //$('#dlgpay2').dialog('close');	 
            				if (result.errorMsg){
            					$.messager.show({
            						title: 'Error',
            						msg: result.errorMsg
            					});
            				} else {
            					$('#dlgpay2').dialog('close');
            					$('#dgpay').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function prosespay3(){
            var blthnya = $("#blthpaycari").datebox('getValue');
            var nipnya = $("#nippaycari").textbox('getValue');
    		$('#dlgpay3').dialog('open').dialog('setTitle','Proses Payroll Perorangan');
    		$('#fmpay3').form('clear');
            $("#blthpay3").datebox('setValue', blthnya);
            $("#nippay3").textbox('setValue', nipnya);
    		url = 'save_pay3.php';
    	}
    	function savepay3(){
    		$('#fmpay3').form('submit',{
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
    					$('#dlgpay3').dialog('close');
    					$('#dgpay').datagrid('reload');
    				}
    			}
    		});
    	}
    	function prosespay4(){
            var kelompoknya = $("#kelompokpaycari").combobox('getValue');
            var blthnya = $("#blthpaycari").datebox('getValue');
            var nipnya = $("#nippaycari").textbox('getValue');
    		$('#dlgpay4').dialog('open').dialog('setTitle','Reset Payroll Perorangan');
    		$('#fmpay4').form('clear');
            $("#blthpay4").datebox('setValue', blthnya);
            $("#nippay4").textbox('setValue', nipnya);
    		url2 = 'save_pay4.php';
    	}
    	function savepay4(){
			$.messager.confirm('Konfirmasi','Anda yakin melakukan proses ini?',function(r){
				if (r){
            		$('#fmpay4').form('submit',{
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
            					$('#dlgpay4').dialog('close');
            					$('#dgpay').datagrid('reload');
            				}
            			}
            		});
				}
			});
    	}
    	function editpay(){
    		var row = $('#dgpay').datagrid('getSelected');
    		if (row){
    			$('#dlgpay3').dialog('open').dialog('setTitle','Proses Payroll Per Pegawai');
                $('#fmpay3').form('clear');
    			$('#fmpay3').form('load',row);            
    			url = 'save_pay3.php';
    		}
    	}
    	function destroypay(){
    		var row = $('#dgpay').datagrid('getSelected');
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus pay "'+row.nama_pay+'"?',function(r){
    				if (r){
    					$.post('destroy_pay.php',{id:row.id},function(result){
    						if (result.success){
    							$('#dgpay').datagrid('reload');
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
            var rows = $('#dgpay').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idpay);
            }
            var ids2 = ids.join(';');
    		if (jumlah>0){
                window.open('cetakslip2new.php?ids2='+ids2,'_blank');
            }
        }
  
    	function cetakList(){
            var blthnya2 = $("#blthpaycari").datebox('getValue');
            var kd_projectnya2 = $("#kd_projectpaycari").combobox('getValue');
            var kd_unitnya2 = $("#kd_unitpaycari").combobox('getValue');
            var kd_jenisnya2 = $("#kd_jenispaycari").combobox('getValue');
            var kd_kategorinya2 = $("#kd_kategoripaycari").combobox('getValue');
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
            var blthnya = $("#blthpaycari").datebox('getValue');
            var ids = [];
            var rows = $('#dgpay').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idpay);
            }
            var ids2 = ids.join('|');
    		if (jumlah>0){
                window.open('<?=$foldernya;?>cetakslip2.php?blth='+blthnya+'&ids2='+ids2,'_blank');
            }
        }

        function downloadpay(){
            var blthnya = $('#blthpaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_payroll.php?blth="+blthnya,"_blank");
        }
        function gajipegawai(){
            var blthnya = $('#blthpaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajipegawai.php?blth="+blthnya,"_blank");
        }
        function gajihonor(){
            var blthnya = $('#blthpaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajihonor.php?blth="+blthnya,"_blank");
        }
        function gajirekap(){
            var blthnya = $('#blthpaycari').datebox('getValue');
            window.open("<?=$foldernya;?>download_gajirekap.php?blth="+blthnya,"_blank");
        }        
        
        $("#dgpay").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmpay{
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
    	.fitempay{
    		margin-bottom:5px;
    	}
    	.fitempay label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitempay input{
    		width:200px;
    	}
    	#fmpay.numberbox input{
    		text-align:right;
    	}
    </style>
<?php
}
?>