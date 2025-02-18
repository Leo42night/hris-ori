<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    include "koneksi_sipeg.php";
    $foldernya = "sipeg/"
    ?>
    <!--<script type="text/javascript" src="datagrid-filter.js"></script>-->
	<script type="text/javascript">                     
		function doSearchrijin(){
            //kosongkan();
            $('#dgrijin').datagrid('load',{    
                jenis_ijinrijincari: $('#jenis_ijinrijincari').combobox('getValue'),
                niprijincari: $('#niprijincari').textbox('getValue'),			            
			});                        
		}
        
        $('#kd_unitrijincari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkrijincari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectkelompokrijincari(){
            var nilai1 = $('#kelompokrijincari').combobox('getValue');
            var nilai2 = $('#kd_regionrijincari').combobox('getValue');
            var nilai3 = $('#kd_cabangrijincari').combobox('getValue');
            var url1 = 'get_spkrijincari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			/*
            $('#no_spkrijincari').combogrid('clear');
            $('#no_spkrijincari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrijincari').combogrid('setValue','SEMUA');
            */
    	}

        function onSelectregionrijincari(){
            var nilai1 = $('#kelompokrijincari').combobox('getValue');
            var nilai2 = $('#kd_regionrijincari').combobox('getValue');
            var nilai3 = $('#kd_cabangrijincari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkrijincari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangrijincari').combobox('clear');
            $('#kd_cabangrijincari').combobox('reload',url2);
            $('#kd_cabangrijincari').combobox('setValue','000');

            $('#kd_unitrijincari').combobox('clear');
            $('#kd_unitrijincari').combobox('reload',url3);
            $('#kd_unitrijincari').combobox('setValue','semua');
            /*
            $('#no_spkrijincari').combogrid('clear');
            $('#no_spkrijincari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrijincari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangrijincari(){
            var nilai1 = $('#kelompokrijincari').combobox('getValue');
            var nilai2 = $('#kd_regionrijincari').combobox('getValue');
            var nilai3 = $('#kd_cabangrijincari').combobox('getValue');
            //var url1 = 'get_spkrijincari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitrijincari').combobox('clear');
            $('#kd_unitrijincari').combobox('reload',url2);
            $('#kd_unitrijincari').combobox('setValue','semua');
            /*
            $('#no_spkrijincari').combogrid('clear');
            $('#no_spkrijincari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrijincari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenisrijincari').combobox('getValue');
            var nilai2 = $('#kd_projectrijincari').combobox('getValue');
            var url2 = 'get_unitrijincari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitrijincari').combobox('enable');
            //$('#kd_unitrijincari').combobox('clear'); 
            $('#kd_unitrijincari').combogrid('clear');
            $('#kd_unitrijincari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksirijin(value,row,index){
            if(parseInt(row.approve2rijin)!==2){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editrijin(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroyrijin(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            }
            return a+b;
        }  

        function namajabatanrijin(value,row,index){
            var a = row.namarijin;
            a += '<br/><span style="font-size:10px !important;color:#1E90FF;">'+row.jabatanrijin+'</span>';
            return a;
        }  

        function evidennyarijin(value,row,index){
            if(row.evidenrijin!==""){
                var a = '<img src="'+row.evidenrijin+'" style="width:60px">';
            } else {
                var a = '';
            }
            return a;
        }  

        function approvalrijin(value,row,index){
            var a = row.nama_approval1rijin;
            a += '<span class="brxsmall1"></span>'
            if(parseInt(row.approve1rijin)===2){
                a += '<span style="color:#1E90FF;font-size:11px;">Approved</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="font-size:10px;">'+row.tgl_approve12rijin+'</span>'
            } else if(parseInt(row.approve1rijin)===1){
                a += '<span style="color:#FF4500;font-size:11px;">Rejected</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="color:#FF4500;font-size:10px;">'+row.alasan_reject1rijin+'</span>'
            } else {
                a += '<span style="color:#FF4500;font-size:11px;">Menunggu Approval</span>'
            }
            return a;
        }
        
        function getdatapegawai(){
            var nipnya = $("#niprijin").textbox('getValue');
            var idnya = $("#idrijin").val();
            //alert(nipnya);
            $.ajax({
                type : "POST",
                url  : "<?=$foldernya;?>get_datapegawai.php",
                dataType : "JSON",
                data : {"nip": nipnya,"id": idnya},
                cache:false,
                success: function(data){
                    //alert(data);
                    $.each(data,function(){
                        $("#namarijin").textbox('setValue',data.nama);
                    });                    
                    
                }
            });
            //return false;            
            
        }

		function cellStylerRow(value,rijin,index){
			if (rijin.statusrijin == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,rijin,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,rijin){
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

        function formatrp3(val,rijin){
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

        function formatrp4(val,rijin){
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
        function onSelectregionalrijincari(){
            var nilai1 = $('#kd_regionalrijincari').combobox('getValue');
            var url2 = 'get_unitrijincari.php?kd_regional='+nilai1;
            $('#kd_unitrijincari').combobox('enable');
            $('#kd_unitrijincari').combobox('clear'); 
            $('#kd_unitrijincari').combobox('reload',url2);
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
        $("#dgrijin").datagrid({
            
        });
    });
    </script>
    <table id="dgrijin" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_rijin.php" pageSize="20"        
    		toolbar="#toolbarrijin" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>            
    			<!--<th rowspan="2" field="norijin" width="50" align="center" halign="center">No</th>-->
    			<th rowspan="2" field="aksirijin" width="90" align="center" halign="center" data-options="formatter:aksirijin,styler:styler1">Aksi</th>
    			<th rowspan="2" field="niprijin" width="120" align="center" halign="center" data-options="styler:styler1">Nip</th>
    			<th rowspan="2" field="namajabatanrijin" width="200" align="left" halign="center" data-options="formatter:namajabatanrijin,styler:styler1">Nama<br/>Jabatan</th>
    			<th rowspan="2" field="tgl_pengajuan2rijin" width="110" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Pengajuan</th>
                <th rowspan="2" field="jenis_ijinrijin" width="110" align="center" halign="center" data-options="styler:styler1">Jenis<br/>Izin</th>
                <th colspan="3">Periode Izin</th>
    			<th rowspan="2" field="alasan_ijinrijin" width="200" align="left" halign="center" data-options="styler:styler1">Alasan Izin</th>
    			<th rowspan="2" field="evidennyarijin" width="70" align="center" halign="center" data-options="formatter:evidennyarijin,styler:styler1">Eviden</th>
                <th rowspan="2" field="approvalrijin" width="300" align="left" halign="center" data-options="formatter:approvalrijin,styler:styler2">Status Approval</th>
    		</tr>
            <tr>
    			<th field="tgl_awal2rijin" width="100" align="center" halign="center" data-options="styler:styler1">Awal</th>
    			<th field="tgl_akhir2rijin" width="100" align="center" halign="center" data-options="styler:styler1">Akhir</th>
                <th field="haririjin" width="50" align="center" halign="center" data-options="styler:styler1">Hari</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarrijin">
    	<div id="tbrijin" style="padding:3px">            
            <table>
            <tr>
                <td>JENIS IZIN</td>
                <td>
                    <select id="jeniss_ijinrijincari" name="jeniss_ijinrijincari" class="easyui-combobox" editable="false" data-options="required:true,panelHeight:'auto'" style="width: 240px;">
                        <option value="semua">Semua</option>
                        <option value="Ijin Sakit">Ijin Sakit</option>
                        <option value="Ijin Lainnya">Ijin Lainnya</option>
                    </select>                            
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niprijincari" name="niprijincari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchrijin()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addrijin()" style="min-width:90px;">Pengajuan Izin</a>
                </td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgrijin" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding:10px;top:40px;"
    		closed="true" buttons="#dlg-buttonsrijin">
    	<form id="fmrijin" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idrijin" name="idrijin">
            <table>            
                <tr>
                    <td>
                        <div style="color:red;font-size:10.5px !important;width:360px;">*) Untuk ijin sakit lebih dari 2 hari, wajib melampirkan surat keterangan dokter</div>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Nip</label></div>
                        <input class="easyui-textbox" id="niprijin" name="niprijin" missingMessage="Harus di isi" data-options="onChange:getdatapegawai,required:true" style="width: 360px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namarijin" name="namarijin" missingMessage="Harus di isi" data-options="required:true" style="width: 360px;" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Jenis Izin</label></div>
                        <select id="jenis_ijinrijin" name="jenis_ijinrijin" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 360px;">
                            <option value="Ijin Sakit">Ijin Sakit</option>
                            <option value="Ijin Lainnya">Ijin Lainnya</option>                            
                        </select>                            
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Periode Izin</label></div>
                        <input class="easyui-datebox" id="tgl_awalrijin" name="tgl_awalrijin" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        &nbsp;s.d&nbsp;
                        <input class="easyui-datebox" id="tgl_akhirrijin" name="tgl_akhirrijin" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        &nbsp;=&nbsp;
                        <input class="easyui-numberbox" id="haririjin" name="haririjin" missingMessage="Harus di isi" data-options="required:true,min:0" style="width: 40px;"> &nbsp;hari
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="labelfor"><label>Alasan Izin</label></div>
                        <input class="easyui-textbox" id="alasan_ijinrijin" name="alasan_ijinrijin" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;">
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                        <div class="labelfor"><label>Surat Keterangan Dokter</label></div>
                        <table>
                            <tr>
                                <td style="vertical-align:top;">                                
                                    <input type="hidden" id="extrijin" name="extrijin">
                                    <img id="evidenrijin" src="" style="width:100px;height:100px">
                                    <div style="display:none">
                                        <input class="easyui-filebox" id="evidenrijin2" name="evidenrijin2" style="width:100px" data-options="
                                            prompt:'Choose a file...',
                                            onChange: function(value){
                                                var f = $(this).next().find('input[type=file]')[0];
                                                if (f.files && f.files[0]){
                                                    var name = $(this).filebox('getValue');
                                                    var ss = name.split('.');
                                                    var ext = ss.pop();
                                                    if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                        $('#extrijin').val(ext);
                                                    } else {
                                                        $('#extrijin').val('');
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = function(e){
                                                        if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                            $('#evidenrijin').attr('src', e.target.result);
                                                        } else {
                                                            $('#evidenrijin').attr('src', '');
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
            $('#evidenrijin').click(function(){
                $('#evidenrijin2').next().find('.textbox-value')[0].click();
            });
        </script>

    </div>
    <div id="dlg-buttonsrijin">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saverijin()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrijin').dialog('close')" style="min-width:90px">Batal</a>
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
        function addrijin(){
            $('#dlgrijin').dialog('open').dialog('setTitle','Input Izin Pegawai');
            $('#fmrijin').form('clear');
            $("#niprijin").textbox('readonly',false);
            $("#evidenrijin").attr('src', "");
            url = '<?=$foldernya;?>save_rijin.php';  
        } 
        function editrijin(index){
            var row = $('#dgrijin').datagrid('getRow', index);
    		if (row){
                $('#dlgrijin').dialog('open').dialog('setTitle','Update Izin Pegawai');
                $('#fmrijin').form('clear');
    			$('#fmrijin').form('load',row);   
                $("#niprijin").textbox('readonly',true);
                $("#evidenrijin").attr('src', row.evidenrijin);
                url = '<?=$foldernya;?>update_rijin.php?id='+row.idrijin;  
            }
        } 
    	function saverijin(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmrijin').form('submit',{
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
                        $('#dlgrijin').dialog('close');
                        $('#dgrijin').datagrid('reload');
                    }
                }
            });
    	}

    	function destroyrijin(index){ 
            var row = $('#dgrijin').datagrid('getRow', index);
    		if (row){
                $.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
                    if (r){
                        $.post('<?=$foldernya;?>destroy_rijin.php',{id:row.idrijin},function(result){
                            if (result.success){
                                $('#dgrijin').datagrid('reload');
                            } else {
                                $.messager.alert('ERROR',result.errorMsg,'warning');
                            }
                        },'json');
                    }
                });
    		}
    	}

        function downloadabsensi(){
			var kelompoknya2 = $('#kelompokrijincari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionrijincari').combobox('getValue');
			var nama_regionnya = $('#kd_regionrijincari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangrijincari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangrijincari').combobox('getText');            
			var kd_unitnya = $('#kd_unitrijincari').combobox('getValue');
			var no_spknya = $('#no_spkrijincari').textbox('getText');
            var tanggalnya = $('#tanggalrijincari').datebox('getValue');
            window.open("download_rijin.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        $("#dgrijin").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmrijin{
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
        .labelfor1 {
            font-weight:bold;
            font-size:11.5px;
            margin-bottom:3px !important;
        }
        .labelfor {
            font-weight:600;
            font-size:11.5px;
            margin-bottom:3px !important;
            margin-top:5px !important;
        }
        .brxsmall {
            display: block;
            margin-bottom: 0.1em !important;
        }
        .brxsmall1 {
            display: block;
            margin-bottom: -.3em !important;
        }
        .brxsmall2 {
            display: block;
            margin-bottom: -.7em !important;
        }

    </style>
<?php
}
?>