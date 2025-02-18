<?php
// Rekapitulasi Izin
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/cuti/";
    ?>
    <!--<script type="text/javascript" src="datagrid-filter.js"></script>-->
	<script type="text/javascript">                     
		function doSearchmijin(){
            $('#dgmijin').datagrid('load',{                
                tgl_awalmijincari: $('#tgl_awalmijincari').datebox('getValue'),
                tgl_akhirmijincari: $('#tgl_akhirmijincari').datebox('getValue'),
                nipmijincari: $('#nipmijincari').textbox('getValue'),
			});                        
		}
        
        $('#kd_unitmijincari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkmijincari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectkelompokmijincari(){
            var nilai1 = $('#kelompokmijincari').combobox('getValue');
            var nilai2 = $('#kd_regionmijincari').combobox('getValue');
            var nilai3 = $('#kd_cabangmijincari').combobox('getValue');
            var url1 = 'get_spkmijincari.php[not_found]?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			/*
            $('#no_spkmijincari').combogrid('clear');
            $('#no_spkmijincari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkmijincari').combogrid('setValue','SEMUA');
            */
    	}

        function onSelectregionmijincari(){
            var nilai1 = $('#kelompokmijincari').combobox('getValue');
            var nilai2 = $('#kd_regionmijincari').combobox('getValue');
            var nilai3 = $('#kd_cabangmijincari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkmijincari.php[not_found]?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangmijincari').combobox('clear');
            $('#kd_cabangmijincari').combobox('reload',url2);
            $('#kd_cabangmijincari').combobox('setValue','000');

            $('#kd_unitmijincari').combobox('clear');
            $('#kd_unitmijincari').combobox('reload',url3);
            $('#kd_unitmijincari').combobox('setValue','semua');
            /*
            $('#no_spkmijincari').combogrid('clear');
            $('#no_spkmijincari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkmijincari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangmijincari(){
            var nilai1 = $('#kelompokmijincari').combobox('getValue');
            var nilai2 = $('#kd_regionmijincari').combobox('getValue');
            var nilai3 = $('#kd_cabangmijincari').combobox('getValue');
            //var url1 = 'get_spkmijincari.php[not_found]?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitmijincari').combobox('clear');
            $('#kd_unitmijincari').combobox('reload',url2);
            $('#kd_unitmijincari').combobox('setValue','semua');
            /*
            $('#no_spkmijincari').combogrid('clear');
            $('#no_spkmijincari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkmijincari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenismijincari').combobox('getValue');
            var nilai2 = $('#kd_projectmijincari').combobox('getValue');
            var url2 = 'get_unitmijincari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitmijincari').combobox('enable');
            //$('#kd_unitmijincari').combobox('clear'); 
            $('#kd_unitmijincari').combogrid('clear');
            $('#kd_unitmijincari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksimijin(value,row,index){
            var a = '<a href="javascript:void(0)" title="Update Data" onclick="editmijin(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroymijin(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            return a+b;
        }  

        function namajabatanmijin(value,row,index){
            var a = row.namamijin;
            a += '<br/><span style="font-size:10px !important;color:blue;">'+row.jabatanmijin+'</span>';
            return a;
        }  

        function approvalmijin(value,row,index){
            var a = '<div style="width:100%;padding-bottom:10px;">';
            a += '<table style="width:100%;">';
            a += '<tr>';
            a += '<td style="width:50px;border:none;">Level I</td>';
            a += '<td style="width:10px;border:none;">:</td>';
            a += '<td style="border:none;">';
            if(parseInt(row.approve1mijin)===2){
                a += '<span style="color:blue;">Approved</span> ('+row.nama_approval1mijin+')'
            } else if(parseInt(row.approve1mijin)===1){
                a += '<span style="color:red;">Rejected</span> ('+row.nama_approval1mijin+')'
                a += '<span style="color:red;">'+row.alasan_reject1mijin+'</span>'
            } else {
                a += '<span style="">Menunggu Approval</span>'
            }
            a += '</td>';
            a += '</tr>';
            a += '<tr>';
            a += '<td style="border:none;">Level II</td>';
            a += '<td style="border:none;">:</td>';
            a += '<td style="border:none;">';
            if(parseInt(row.approve2mijin)===2){
                a += '<span style="color:blue;">Approved</span> ('+row.nama_approval2mijin+')'
            } else if(parseInt(row.approve2mijin)===1){
                a += '<span style="color:red;">Rejected</span> ('+row.nama_approval2mijin+')'
                a += '<span style="color:red;">'+row.alasan_reject2mijin+'</span>'
            } else {
                a += '<span style="">Menunggu Approval</span>'
            }
            a += '</td>';
            a += '</tr>';
            a += '</table>';
            a += '</div>';
            return a;
        }
        
        function getdatapegawai(){
            var nipnya = $("#nipmijin").textbox('getValue');
            //alert(nipnya);
            $.ajax({
                type : "POST",
                url  : "<?=$foldernya;?>get_datapegawai.php",
                dataType : "JSON",
                data : {"nip": nipnya},
                cache:false,
                success: function(data){
                    //alert(data);
                    
                    $.each(data,function(){
                        //alert(data.namanya);
                        $("#namamijin").textbox('setValue',data.namanya);
                        /*
                        $('[name="nama"]').val(data.nama);
                        $('[name="jabatan"]').val(data.jabatan);
                        $('[name="grade"]').val(data.grade);
                        $('#approval1').select2().val(data.approval1).trigger('change');
                        $('#approval2').select2().val(data.approval2).trigger('change');
                        $('#level_sppd').select2().val(data.level_sppd).trigger('change');
                        */
                    });                    
                    
                }
            });
            //return false;            
            
        }

		function cellStylerRow(value,mijin,index){
			if (mijin.statusmijin == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,mijin,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,mijin){
            if(val==="" || val===NaN){
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

        function formatrp3(val,mijin){
            return number_format3(val,3,',','.');
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

        function formatrp4(val,mijin){
            return number_format4(val,2,',','.');
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
        /*
        function onSelectregionalmijincari(){
            var nilai1 = $('#kd_regionalmijincari').combobox('getValue');
            var url2 = 'get_unitmijincari.php?kd_regional='+nilai1;
            $('#kd_unitmijincari').combobox('enable');
            $('#kd_unitmijincari').combobox('clear'); 
            $('#kd_unitmijincari').combobox('reload',url2);
    	}
        */

		function styler1(value,row,index){
            return 'padding-top:10px;padding-bottom:3px;vertical-align: top;';
		}

		function styler2(value,row,index){
            return 'padding-top:0px;padding-bottom:3px;vertical-align: top;';
		}

	</script>
    <script type="text/javascript">
    $(function(){
        $.extend($.fn.textbox.methods, {
        	show: function(jq){
        		return jq.each(function(){
        			$(this).next().show();
        		})
        	},
        	hide: function(jq){
        		return jq.each(function(){
        			$(this).next().hide();
        		})
        	}
        });
    });
    </script>
    <script type="text/javascript">
    $(function(){
        $("#dgmijin").datagrid({
            
        });
    });
    </script>
    <table id="dgmijin" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mijin.php" pageSize="20"        
    		toolbar="#toolbarmijin" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>            
    			<!--<th rowspan="2" field="aksimijin" width="90" align="center" halign="center" data-options="formatter:aksimijin,styler:styler1">Aksi</th>-->
    			<th rowspan="2" field="nipmijin" width="120" align="center" halign="center" data-options="">Nip</th>
    			<th rowspan="2" field="namamijin" width="220" align="left" halign="center" data-options="">Nama</th>
    			<th rowspan="2" field="jabatanmijin" width="350" align="left" halign="center" data-options="">Jabatan</th>
                <th colspan="2">Periode</th>
                <th colspan="3">Jumlah Izin (hari)</th>
    		</tr>
            <tr>
    			<th field="tgl_awalnyamijin" width="100" align="center" halign="center" data-options="">Awal</th>
                <th field="tgl_akhirnyamijin" width="100" align="center" halign="center" data-options="">Akhir</th>
                <th field="jumlah_pengajuanmijin" width="100" align="center" halign="center" data-options="">Pengajuan</th>
                <th field="jumlah_realisasimijin" width="100" align="center" halign="center" data-options="">Realisasi</th>
                <th field="jumlah_totalmijin" width="100" align="center" halign="center" data-options="">Total</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarmijin">
    	<div id="tbmijin" style="padding:3px">            
            <table>
            <tr>            
                <td>PERIODE</td>
                <td>
                    <input class="easyui-datebox" id="tgl_awalmijincari" name="tgl_awalmijincari" value="<?=date('Y-m-01');?>" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    &nbsp;s.d&nbsp;
                    <input class="easyui-datebox" id="tgl_akhirmijincari" name="tgl_akhirmijincari" value="<?=date('Y-m-d');?>" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                </td>
                <td style="padding-left:10px;">NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipmijincari" name="nipmijincari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmijin()" style="min-width:90px;">Search</a>
                    <a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file-excel" onclick="downloadrekapmijin()">Download Rekap</a>
                    <!--<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addmijin()" style="min-width:90px;">Pengajuan Cuti</a>-->
                </td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgmijin" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmijin">
    	<form id="fmmijin" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>            
                <tr>
                    <td colspan="2">
                        <span style="color:red;font-size:10.5px !important;">*) Untuk ijin sakit lebih dari 2 hari, wajib melampirkan surat keterangan dokter</span>
                    </td>                    
                </tr>
                <tr>
                    <td>NIP</td>                    
                    <td><input class="easyui-textbox" id="nipmijin" name="nipmijin" missingMessage="Harus di isi" data-options="onChange:getdatapegawai,required:true" style="width: 360px;"></td>
                </tr>
                <tr>
                    <td>Nama</td>                    
                    <td><input class="easyui-textbox" id="namamijin" name="namamijin" missingMessage="Harus di isi" data-options="required:true" style="width: 360px;" readonly></td>
                </tr>
                <tr>
                    <td class="nowrap">Jenis Izin</td>
                    <td>
                        <select id="jenis_ijinmijin" name="jenis_ijinmijin" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 360px;">
                            <option value="Ijin Sakit">Ijin Sakit</option>
                            <option value="Ijin Lainnya">Ijin Lainnya</option>                            
                        </select>                            
                    </td>
                </tr>
                <tr>
                    <td>Awal</td>                    
                    <td>
                        <input class="easyui-datebox" id="tgl_awalmijin" name="tgl_awalmijin" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
                <tr>
                    <td>Akhir</td>                    
                    <td>
                        <input class="easyui-datebox" id="tgl_akhirmijin" name="tgl_akhirmijin" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
                <tr>
                    <td>Lama</td>                    
                    <td><input class="easyui-numberbox" id="harimijin" name="harimijin" missingMessage="Harus di isi" data-options="required:true,min:0" style="width: 40px;"> &nbsp;hari</td>
                </tr>
                <tr>
                    <td style="vertical-align:top;padding-top:5px;">Alasan Izin</td>                    
                    <td><input class="easyui-textbox" id="alasan_ijinmijin" name="alasan_ijinmijin" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;"></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;padding-top:5px;">Surat Dokter</td>
                    <td style="vertical-align:top;">
                        <table>
                            <tr>
                                <td style="vertical-align:top;">                                
                                    <input type="hidden" id="extmijin" name="extmijin">
                                    <img id="evidenmijin" src="" style="width:100px;height:100px">
                                    <div style="display:none">
                                        <input class="easyui-filebox" id="evidenmijin2" name="evidenmijin2" style="width:100px" data-options="
                                            prompt:'Choose a file...',
                                            onChange: function(value){
                                                var f = $(this).next().find('input[type=file]')[0];
                                                if (f.files && f.files[0]){
                                                    var name = $(this).filebox('getValue');
                                                    var ss = name.split('.');
                                                    var ext = ss.pop();
                                                    if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                        $('#extmijin').val(ext);
                                                    } else {
                                                        $('#extmijin').val('');
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = function(e){
                                                        if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                            $('#evidenmijin').attr('src', e.target.result);
                                                        } else {
                                                            $('#evidenmijin').attr('src', '');
                                                        }
                                                    }
                                                    reader.readAsDataURL(f.files[0]);
                                                }
                                            }">                                    
                                    </div>                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
    	</form>
        <script>
            $('#evidenmijin').click(function(){
                $('#evidenmijin2').next().find('.textbox-value')[0].click();
            });
        </script>

    </div>
    <div id="dlg-buttonsmijin">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savemijin()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmijin').dialog('close')" style="min-width:90px">Batal</a>
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
        var url; 
        function addmijin(){
            $('#dlgmijin').dialog('open').dialog('setTitle','Input Izin Pegawai');
            $('#fmmijin').form('clear');
            $("#nipmijin").textbox('readonly',false);
            $("#evidenmijin").attr('src', "");
            url = 'save_mijin.php[not_found]';  
        } 
        function editmijin(index){
            var row = $('#dgmijin').datagrid('getRow', index);
    		if (row){
                $('#dlgmijin').dialog('open').dialog('setTitle','Update Izin Pegawai');
                $('#fmmijin').form('clear');
    			$('#fmmijin').form('load',row);   
                $("#nipmijin").textbox('readonly',true);
                $("#evidenmijin").attr('src', row.evidenmijin);
                url = 'update_mijin.php[not_found]?id='+row.idmijin;  
            }
        } 
    	function savemijin(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmijin').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    alert(result);
                    $.messager.progress('close');
                    var result = eval('(' + result + ')');
                    if (result.errorMsg){
                        $.messager.alert('ERROR',result.errorMsg,'warning');
                        /*
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                        */
                    } else {
                        $('#dlgmijin').dialog('close');
                        $('#dgmijin').datagrid('reload');
                    }
                }
            });
    	}

        function cetakabsensi(){
			var kelompoknya2 = $('#kelompokmijincari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionmijincari').combobox('getValue');
			var nama_regionnya = $('#kd_regionmijincari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangmijincari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangmijincari').combobox('getText');            
			var kd_unitnya = $('#kd_unitmijincari').combobox('getValue');
			var no_spknya = $('#no_spkmijincari').textbox('getText');
            var tanggalnya = $('#tanggalmijincari').datebox('getValue');
            //window.open("lapmijin.php[not_found]?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&nip_nama="+nip_namanya,"_blank");
            window.open("lapmijin.php[not_found]?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        function downloadabsensi(){
			var kelompoknya2 = $('#kelompokmijincari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionmijincari').combobox('getValue');
			var nama_regionnya = $('#kd_regionmijincari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangmijincari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangmijincari').combobox('getText');            
			var kd_unitnya = $('#kd_unitmijincari').combobox('getValue');
			var no_spknya = $('#no_spkmijincari').textbox('getText');
            var tanggalnya = $('#tanggalmijincari').datebox('getValue');
            window.open("<?=$foldernya;?>download_mijin.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        function downloadrekapmijin(){
            var tgl_awal = $('#tgl_awalmijincari').datebox('getValue');
            var tgl_akhir = $('#tgl_akhirmijincari').datebox('getValue');
            window.open("<?=$foldernya;?>download_mijin.php?tgl_awal="+tgl_awal+"&tgl_akhir="+tgl_akhir,"_blank");
        } 

        $("#dgmijin").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmmijin{
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
    	.fitemupt{
    		margin-bottom:5px;
    	}
    	.fitemupt label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemupt input{
    		width:200px;
    	}
    </style>
<?php
}
?>