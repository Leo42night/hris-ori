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
	<script type="text/javascript">                     
		function doSearchlibur(){
            $('#dglibur').datagrid('load',{                
				tahunliburcari: $('#tahunliburcari').numberbox('getValue'),			
			});                        
		}
        
        $('#kd_unitliburcari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkliburcari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectkelompokliburcari(){
            var nilai1 = $('#kelompokliburcari').combobox('getValue');
            var nilai2 = $('#kd_regionliburcari').combobox('getValue');
            var nilai3 = $('#kd_cabangliburcari').combobox('getValue');
            var url1 = 'get_spkliburcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			/*
            $('#no_spkliburcari').combogrid('clear');
            $('#no_spkliburcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkliburcari').combogrid('setValue','SEMUA');
            */
    	}

        function onSelectregionliburcari(){
            var nilai1 = $('#kelompokliburcari').combobox('getValue');
            var nilai2 = $('#kd_regionliburcari').combobox('getValue');
            var nilai3 = $('#kd_cabangliburcari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkliburcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php?kd_region='+nilai2;
            var url3 = 'get_unitcari.php?kd_region='+nilai2;
            $('#kd_cabangliburcari').combobox('clear');
            $('#kd_cabangliburcari').combobox('reload',url2);
            $('#kd_cabangliburcari').combobox('setValue','000');

            $('#kd_unitliburcari').combobox('clear');
            $('#kd_unitliburcari').combobox('reload',url3);
            $('#kd_unitliburcari').combobox('setValue','semua');
            /*
            $('#no_spkliburcari').combogrid('clear');
            $('#no_spkliburcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkliburcari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangliburcari(){
            var nilai1 = $('#kelompokliburcari').combobox('getValue');
            var nilai2 = $('#kd_regionliburcari').combobox('getValue');
            var nilai3 = $('#kd_cabangliburcari').combobox('getValue');
            //var url1 = 'get_spkliburcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitliburcari').combobox('clear');
            $('#kd_unitliburcari').combobox('reload',url2);
            $('#kd_unitliburcari').combobox('setValue','semua');
            /*
            $('#no_spkliburcari').combogrid('clear');
            $('#no_spkliburcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkliburcari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenisliburcari').combobox('getValue');
            var nilai2 = $('#kd_projectliburcari').combobox('getValue');
            var url2 = 'get_unitliburcari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitliburcari').combobox('enable');
            //$('#kd_unitliburcari').combobox('clear'); 
            $('#kd_unitliburcari').combogrid('clear');
            $('#kd_unitliburcari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksilibur(value,row,index){
            if(parseInt(row.approve2libur)!==2){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editlibur(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroylibur(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            }
            return a+b;
        }  

        function namajabatanlibur(value,row,index){
            var a = row.namalibur;
            a += '<br/><span style="font-size:10px !important;color:blue;">'+row.jabatanlibur+'</span>';
            return a;
        }  

        function kontaklibur(value,row,index){
            var a = row.alamatlibur;
            a += '<br/><span style="font-size:10px !important;color:#1E90FF;">'+row.teleponlibur+'</span>';
            return a;
        }  

        function keperluanliburnya(value,row,index){
            var a = '<span style="color:#0062c2;">'+row.jenis_cutilibur+'</span>';
            a += '<span class="brxsmall1"></span>'
            a += row.keperluan_cutilibur;
            return a;
        }

        function approvallibur(value,row,index){
            var a = row.nama_approval1libur;
            a += '<span class="brxsmall1"></span>'
            if(parseInt(row.approve1libur)===2){
                a += '<span style="color:#0062c2;font-size:11px;">Approved</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="font-size:10px;">'+row.tgl_approve12libur+'</span>'
            } else if(parseInt(row.approve1libur)===1){
                a += '<span style="color:#FF4500;font-size:11px;">Rejected</span>'
                a += '<span class="brxsmall1"></span>'
                a += '<span style="color:#FF4500;font-size:10px;">'+row.alasan_reject1libur+'</span>'
            } else {
                a += '<span style="color:#FF4500;font-size:11px;">Menunggu Approval</span>'
            }
            return a;
        }
        
        function cekjenis(){ 
            var jenis_cutinya = $("#jenis_cutilibur").combobox('getValue'); 
            var sisa_cuti = $("#sisalibur").val(); 
            var hari = $("#harilibur").numberbox('getValue');
            //alert(jenis_cutinya+" "+sisa_cuti+" "+hari);
            if(jenis_cutinya==="01"){ 
                $("#divinfo").css("display","block");
                $("#harilibur").numberbox({max:parseInt(sisa_cuti)});
                if(parseInt(hari)>parseInt(sisa_cuti)){
                    $("#harilibur").numberbox("setValue",sisa_cuti);
                } else {
                }
            } else {
                $("#divinfo").css("display","none");
                $("#harilibur").numberbox({max:9999});
            }
        }        
        
        function getdatapegawai(){            
            var jenis_cutinya = $("#jenis_cutilibur").combobox('getValue');
            var nipnya = $("#niplibur").textbox('getValue');
            var idnya = $("#idlibur").val();
            //alert(nipnya+" "+idnya);
            $.ajax({
                type : "POST",
                url  : "<?=$foldernya;?>get_datapegawaicuti.php",
                dataType : "JSON",
                data : {"nip": nipnya,"id": idnya},
                cache:false,
                success: function(data){
                    //$("#divinfo").css("display","block");
                    $.each(data,function(){
                        $("#namalibur").textbox('setValue',data.nama);
                        $("#sisalibur").val(data.sisa_cuti);
                        $("#lbl1").text('Periode Cuti : '+data.batas_awal2+' s.d '+data.batas_akhir2);
                        $("#lbl2").text('Sisa Cuti : '+data.sisa_cuti+' hari');
                        if(jenis_cutinya==="01"){
                            $("#harilibur").numberbox({max:data.sisa_cuti});
                        } else {
                            $("#harilibur").numberbox({max:9999});
                        }
                    });                    
                    
                }
            });
            //return false;            
            
        }

		function cellStylerRow(value,libur,index){
			if (libur.statuslibur == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,libur,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,libur){
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

        function formatrp3(val,libur){
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

        function formatrp4(val,libur){
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
        function onSelectregionalliburcari(){
            var nilai1 = $('#kd_regionalliburcari').combobox('getValue');
            var url2 = 'get_unitliburcari.php?kd_regional='+nilai1;
            $('#kd_unitliburcari').combobox('enable');
            $('#kd_unitliburcari').combobox('clear'); 
            $('#kd_unitliburcari').combobox('reload',url2);
    	}
        */

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}

		function styler2(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
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
        $("#dglibur").datagrid({
            
        });
    });
    </script>
    <table id="dglibur" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_libur.php" pageSize="20"        
    		toolbar="#toolbarlibur" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>            
    			<th field="aksilibur" width="90" align="center" halign="center" data-options="formatter:aksilibur,styler:styler1">Aksi</th>
    			<th field="tanggal2libur" width="110" align="center" halign="center" data-options="styler:styler1">Tanggal</th>
    			<th field="keteranganlibur" width="600" align="left" halign="left" data-options="styler:styler1">Keterangan</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarlibur">
    	<div id="tblibur" style="padding:3px">            
            <table>
            <tr>
                <td>TAHUN</td>
                <td>
                    <input class="easyui-numberbox" id="tahunliburcari" name="tahunliburcari" value="<?=date('Y');?>" data-options="required:false,min:2000" style="width: 60px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchlibur()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addlibur()" style="min-width:90px;">Input Data</a>
                </td>
            </tr>
            </table>
            
            <table>
            <tr>
                <td>
                    <div id="divproses1"></div>
                </td>
            </tr>            
            </table>
    	</div>
    </div>
    
    <div id="dlglibur" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding:10px;top:40px;"
    		closed="true" buttons="#dlg-buttonslibur">
    	<form id="fmlibur" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idlibur" name="idlibur">
            <input type="hidden" id="sisalibur" name="sisalibur">
            <table>            
                <tr>
                    <td>
                        <div>
                            <div class="labelfor1"><label>Tanggal</label></div>
                            <input class="easyui-datebox" id="tanggallibur" name="tanggallibur" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        </div>                        
                    </td>                        
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Keterangan</label></div>
                            <input class="easyui-textbox" id="keteranganlibur" name="keteranganlibur" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;">
                        </div>                        
                    </td>                        
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonslibur">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savelibur()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlglibur').dialog('close')" style="min-width:90px">Batal</a>
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
        function addlibur(){
            $('#dlglibur').dialog('open').dialog('setTitle','Input Libur Nasional');
            $('#fmlibur').form('clear');
            url = '<?=$foldernya;?>save_libur.php';  
        } 
        function editlibur(index){
            var row = $('#dglibur').datagrid('getRow', index);
    		if (row){
                $('#dlglibur').dialog('open').dialog('setTitle','Update Libur Nasional');
                $('#fmlibur').form('clear');
    			$('#fmlibur').form('load',row);   
                url = '<?=$foldernya;?>update_libur.php?id='+row.idlibur;  
            }
        } 
    	function savelibur(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmlibur').form('submit',{
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
                    } else {
                        $('#dlglibur').dialog('close');
                        $('#dglibur').datagrid('reload');
                    }
                }
            });
    	}

    	function destroylibur(index){ 
            var row = $('#dglibur').datagrid('getRow', index);
    		if (row){
                $.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
                    if (r){
                        $.post('<?=$foldernya;?>destroy_libur.php',{id:row.idlibur},function(result){
                            if (result.success){
                                $('#dglibur').datagrid('reload');
                            } else {
                                $.messager.alert('ERROR',result.errorMsg,'warning');
                            }
                        },'json');
                    }
                });
    		}
    	}

        function downloadabsensi(){
			var kelompoknya2 = $('#kelompokliburcari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionliburcari').combobox('getValue');
			var nama_regionnya = $('#kd_regionliburcari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangliburcari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangliburcari').combobox('getText');            
			var kd_unitnya = $('#kd_unitliburcari').combobox('getValue');
			var no_spknya = $('#no_spkliburcari').textbox('getText');
            var tanggalnya = $('#tanggalliburcari').datebox('getValue');
            window.open("download_libur.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        $("#dglibur").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmlibur{
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