<?php
//error_reporting(0);
require 'vendor/autoload.php';
require_once 'vendor/pear/http_request2/HTTP/Request2.php'; // Only when installed with PEAR
session_start();
$timeout = 1440;// setting timeout dalam menit
//$logout = "index.php"; // redirect halaman logout
$timeout = $timeout * 60; // menit ke detik
if (isset($_SESSION['start_session'])) {
	$elapsed_time = time() - $_SESSION['start_session'];
	if ($elapsed_time >= $timeout) {
		session_destroy();
		header('Location: login.php');
	}
}
$_SESSION['start_session'] = time();

if (!isset($_SESSION['userakseshris']) || $_SESSION['isLoggedInhris'] != '1') {
	session_destroy();
	header('Location: login.php');
}

$isLoggedInhris = $_SESSION["isLoggedInhris"];
$userhris = $_SESSION["userakseshris"];
// $superadminhris = $_SESSION["superadminhris"];
$namahris = $_SESSION["namahris"];
$jabatanhris = $_SESSION["jabatanhris"];
$emailhris = $_SESSION["emailhris"];

//echo $userhris."-".$superadminhris;
include_once "database/koneksi.php";
include_once "fungsi.php";

// a = nodes, b = aksesuser
$rs1 = mysqli_query($koneksi, "select a.*, b.proses, b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='DASHBOARD' and a.url<>''");
$jumlah_dashboard = mysqli_num_rows($rs1);
// echo "jumlah dashboard = " . $jumlah_dashboard;
$rs2 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='KEPEGAWAIAN' and a.url<>''");
$jumlah_kepegawaian = mysqli_num_rows($rs2);
// echo "jumlah kepegawaian = " . $jumlah_kepegawaian;
$rs3 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='SPPD' and a.url<>''");
$jumlah_sppd = mysqli_num_rows($rs3);
$rs4 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='CUTI' and a.url<>''");
$jumlah_cuti = mysqli_num_rows($rs4);
$rs5 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='ABSENSI' and a.url<>''");
$jumlah_absensi = mysqli_num_rows($rs5);
$rs6 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='KONSUMSI' and a.url<>''");
$jumlah_konsumsi = mysqli_num_rows($rs6);
$rs7 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='PAYROLL' and a.url<>''");
$jumlah_payroll = mysqli_num_rows($rs7);
$rs8 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='NONRUTIN' and a.url<>''");
$jumlah_nonrutin = mysqli_num_rows($rs8);
$rs9 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='PERPAJAKAN' and a.url<>''");
$jumlah_perpajakan = mysqli_num_rows($rs9);
$rs10 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='API' and a.url<>''");
$jumlah_api = mysqli_num_rows($rs10);
$rs11 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='MASTER' and a.url<>''");
$jumlah_master = mysqli_num_rows($rs11);
$rs12 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='ADMIN' and a.url<>''");
$jumlah_admin = mysqli_num_rows($rs12);
$jumlah_approval = 0;
$rs13 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='HXMS-API' and a.url<>''");
$jumlah_hxms_api = mysqli_num_rows($rs13);
$rs14 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='SAP-API' and a.url<>''");
$jumlah_sap_api = mysqli_num_rows($rs14);
$rs15 = mysqli_query($koneksi, "select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='PEGAWAI' and a.url<>''");
$jumlah_pegawai = mysqli_num_rows($rs15);

$imgdashboard = "dashboard1.png";
$imgkepegawaian = "pegawai1.png";
$imgsppd = "sppd1.png";
$imgcuti = "cuti1.png";
$imgabsensi = "absensi1.png";
$imgkonsumsi = "konsumsi1.png";
$imgpayroll = "payroll1.png";
$imgnonrutin = "income1.png";
$imgperpajakan = "pajak1.png";
$imgapi = "api1.png";
$imgmaster = "master1.png";
$imgadmin = "admin1.png";
$imghxmsapi = "api1.png";
$imgsapapi = "api1.png";
$imgpegawai = "pegawai1.png";



// $rs30 = mysqli_query($koneksi,"select * from baseurl_api order by id desc limit 1");
// $hasil30 = mysqli_fetch_array($rs30);
// if($hasil30){
// 	$baseurl = $hasil30['baseurl'];
// } else {
// 	$baseurl = "";
// }    

// $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
// $rs31 = mysqli_query($koneksi,"select * from akses_token order by id desc limit 1");
// $hasil31 = mysqli_fetch_array($rs31);
// if($hasil31){
// 	$jwtToken = $hasil31['jwtToken'];
// } else {
// 	$jwtToken = "";
// }    

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>::: H R I S :::</title>
	<link rel="shortcut icon" href="assets/favicon.ico">
	<link rel="stylesheet" type="text/css" href="themes/metro/easyui.css">
		<!--<link rel="stylesheet" type="text/css" href="themes/mobile.css">-->
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<link rel="stylesheet" type="text/css" href="themes/color.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="js/datagrid-detailview.js"></script>
		<script type="text/javascript" src="js/datagrid-filter.js"></script>
		<script type="text/javascript" src="js/datagrid-scrollview.js"></script>
		<script type="text/javascript" src="js/datagrid-export.js"></script>

	<link href="fontawesome/css/all.min.css" rel="stylesheet">
	
</head>
<!--<body class="easyui-layout" style="background-image: url('images/hrisbg2new.png'); background-size: cover; background-repeat: no-repeat; background-position: center left;">-->
<body class="easyui-layout" style="background-image: url('assets/bgteamsnew.png'); background-size: cover; background-repeat: no-repeat; background-position: center left;">
<div class="loading">
	<div class="loading__ring"></div>
	<div class="loading__ring"></div>
	<div class="loading__ring"></div>
	<div class="loading__ring"></div>
	<div class="loading__ring"></div>
</div>
<?php if ($userhris) { ?>
						<div data-options="region:'north',border:false" style="height: 40px; padding-top:0px; text-align: right; background-color: transparent;overflow:hidden">
						<!--<div data-options="region:'north',border:false" style="height: 40px; padding-top:3px; text-align: right; background-color: transparent;overflow:hidden;background-image: url('images/hrisheader.png'); background-size: cover; background-repeat: no-repeat; background-position: center left;">-->
								<table style="width: 100%;">
									<tr>        
											<td style="width: 30%; text-align: left; background-color: transparent !important;padding-left:10px;">
													<img src="assets/plnlogo.png" style="height:30px;" />
									</td>
											<td style="width: 70%; text-align: right; background-color: transparent !important;">
										<!--<img src="images/logoplnt.png" height="45px;" />-->
										<div class="easyui-panel" style="text-align: right; border: none; background-color: transparent; padding-top:0px;">
											<?php if ($jumlah_admin > 0 || $userhris == "sandy") { ?>
																	<a href="#" class="easyui-menubutton" data-options="menu:'#menuAdmin',iconCls:'fa fa-cog red'" style="border:none !important;background: transparent;margin-right:100px;text-decoration:none;"><span style="color:black;">ADMIN</span></a>
											<?php } ?>
													<a href="#" class="easyui-menubutton" data-options="menu:'#menuContent',iconCls:'fa fa-user blue'" style="border:none !important;background: transparent;text-decoration:none;"><span style="color:black;"><?= $namahris; ?><span></a>
										</div>
				
										<div id="menuAdmin" class="menu-content" style="width:230px;background: #e4f1ff;border:0 !important;">
											<div style="max-height:200px;overflow-y:scroll;">
											<?php include "views/menu_admin.php"; ?>
											</div>
										</div>
				
										<div id="menuContent" class="menu-content" style="background: #e4f1ff;border:0 !important;">
											<button class="tombol-input" onClick="gantiPass()" style="width:100%;cursor: pointer;text-decoration:none;"><i class="fa fa-lock" style="font-size:10px;margin-left:5px;margin-right:10px;"></i>Ganti Password</button>
											<button class="tombol-input" onClick="window.location.href='logout.php'" style="width:100%;cursor: pointer;text-decoration:none;"><i class="fa fa-power-off" style="font-size:10px;margin-left:5px;margin-right:10px;"></i>Logout</button>
												</div>
											</td>
									</tr>
								</table>
						</div>

						<div id="west" data-options="region:'west',split:false,collapsible:false" title="<span style='font-size:20px;padding-left:3px;padding-right:3px;color:black;font-weight:bold;'>H R I S</span>" headerCls="headernya2" style="width:250px;padding:3px; background: transparent;overflow-y:scroll;overflow-x:hidden;">
							<div id="divmenu" class="easyui-accordion" data-options="multiple:true" style="width:100%;overflow:hidden;">
								<div title="<span style='font-size:9px;'>MAIN MENU</span><span style='font-size:9px;margin-left:30px;'><a href='javascript:void(0)' onclick='closeAllTab()' style='text-decoration:none;'>CLOSE ALL TABS</a></span>" data-options="collapsible:false" style="width:100%;overflow:auto;background:#fff;padding-right:3px;text-align:center;overflow:hidden;">
									<div style="padding-top:10px;font-size:10px;color:#757373;">MENU HXMS</div>
									<table style="width:100%;">
										<tr>
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;">
												<a href='javascript:void(0)' title="DASHBOARD" style='text-decoration: none; color: black;' onclick='showdashboard()'>
													<div>
														<img src="assets/img/<?= $imgdashboard; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">DASHBOARD</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>					
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;">
												<a href='javascript:void(0)' title="KEPEGAWAIAN" style='text-decoration: none; color: black;' onclick='showkepegawaian()'>
													<div>
														<img src="assets/img/<?= $imgkepegawaian; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">KEPEGAWAIAN</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>					
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title=" REST-API" style='text-decoration: none; color: black;' onclick='showhxmsapi()'>
													<div>
														<img src="assets/img/<?= $imgapi; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">HXMS-API</span>
													</div>
												</a>
											</td>
										</tr>
									</table>
									<hr style="border-width: 5vh;width: 100%;border-top: 1px dashed #757373;border-bottom: none;opacity: unset;"/>
									<div style="padding-top:10px;font-size:10px;color:#757373;">MENU SIPEG</div>
									<table style="width:100%;">
										<tr>
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="SPPD" style='text-decoration: none; color: black;' onclick='showpegawai()'>
													<div>
														<img src="assets/img/<?= $imgkepegawaian; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">PEGAWAI</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>					
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="SPPD" style='text-decoration: none; color: black;' onclick='showsppd()'>
													<div>
														<img src="assets/img/<?= $imgsppd; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">S P P D</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>	
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="ABSENSI" style='text-decoration: none; color: black;' onclick='showabsensi()'>
													<div>
														<img src="assets/img/<?= $imgabsensi; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">ABSENSI</span>
													</div>
												</a>
											</td>
										</tr>
										<tr>
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="CUTI" style='text-decoration: none; color: black;' onclick='showcuti()'>
													<div>
														<img src="assets/img/<?= $imgcuti; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">CUTI / IZIN</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>	
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="KONSUMSI" style='text-decoration: none; color: black;' onclick='showkonsumsi()'>
													<div>
														<img src="assets/img/<?= $imgkonsumsi; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">KONSUMSI</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>	
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="PAYROLL" style='text-decoration: none; color: black;' onclick='showpayroll()'>
													<div>
														<img src="assets/img/<?= $imgpayroll; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">PAYROLL</span>
													</div>
												</a>
											</td>
										</tr>
										<tr>
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="PERPAJAKAN" style='text-decoration: none; color: black;' onclick='showperpajakan()'>
													<div>
														<img src="assets/img/<?= $imgperpajakan; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">PERPAJAKAN</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>	
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title=" REST-API" style='text-decoration: none; color: black;' onclick='showsapapi()'>
													<div>
														<img src="assets/img/<?= $imgapi; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">SAP-API</span>
													</div>
												</a>
											</td>
											<td style="width:5%;">&nbsp;</td>	
											<td style="width:30%;padding:3px;text-align:center;vertical-align:top;padding-top:5px;">
												<a href='javascript:void(0)' title="MASTER" style='text-decoration: none; color: black;' onclick='showmaster()'>
													<div>
														<img src="assets/img/<?= $imgmaster; ?>" style="height:40px;" />
														<br/><span style="font-size:9px;color:#069287;">MASTER</span>
													</div>
												</a>
											</td>
										</tr>
									</table>
								</div>

								<!-- panel & tree for submenu -->
		
								<div id="divdashboard" title="<span style='color:#000;'>DASHBOARD</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_dashboard" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_dashboard" class="easyui-tree" data-options="url:'views/menu_dashboard.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div id="divkepegawaian" title="<span style='color:#000;'>KEPEGAWAIAN</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_kepegawaian" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_kepegawaian" class="easyui-tree" data-options="url:'views/menu_kepegawaian.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div id="divsppd" title="<span style='color:#000;'>SPPD</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_sppd" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_sppd" class="easyui-tree" data-options="url:'views/menu_sppd.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>CUTI</span>" style="overflow:auto;background:#fff;padding:5px;">
									<div id="menu_cuti" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_cuti" class="easyui-tree" data-options="url:'views/menu_cuti.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>ABSENSI</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_absensi" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_absensi" class="easyui-tree" data-options="url:'views/menu_absensi.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>KONSUMSI</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_konsumsi" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_konsumsi" class="easyui-tree" data-options="url:'views/menu_konsumsi.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>PAYROLL</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_payroll" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_payroll" class="easyui-tree" data-options="url:'views/menu_payroll.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>PERPAJAKAN</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_nonrutin" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_nonrutin" class="easyui-tree" data-options="url:'views/menu_nonrutin.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>PERPAJAKAN</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_perpajakan" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_perpajakan" class="easyui-tree" data-options="url:'views/menu_perpajakan.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>REST-API</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_api" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_api" class="easyui-tree" data-options="url:'views/menu_api.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>DATA MASTER</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_master" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_master" class="easyui-tree" data-options="url:'views/menu_master.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>ADMIN</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_admin" class="easyui-panel" style="padding:0px; background: transparent; border: none;overflow:hidden;">
										<ul id="tt2_admin" class="easyui-tree" data-options="url:'views/menu_admin.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>HXMS-API</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_hxms_api" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_hxms_api" class="easyui-tree" data-options="url:'views/menu_hxms_api.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>SAP-API</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_sap_api" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_sap_api" class="easyui-tree" data-options="url:'views/menu_sap_api.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
								<div title="<span style='color:#000;'>PEGAWAI</span>" style="overflow:auto;background:#fff;padding:10px;">
									<div id="menu_pegawai" class="easyui-panel" style="padding:0px; background: transparent; border: none;">
										<ul id="tt2_pegawai" class="easyui-tree" data-options="url:'views/menu_pegawai.php',method:'get',animate:true,lines:true"></ul>
									</div>
								</div>
							</div>
						</div>
						
						<div data-options="region:'south',border:false" style="background-color:transparent;height: 25px; padding-left: 5px; padding-right: 5px; text-align: left; padding-top:3px; font-size: 11px; color: black;">
								<table style="width: 100%;">
									<tr>
											<td style="width:40%;white-space: nowrap; color: black; text-align: center;font-weight:bold;font-size:10px;">
										Copyright&copy;2024 - <strong>PLN NUSA DAYA
											</td>
											<td style="width:30%;white-space: nowrap; padding-right: 5px; color: black; text-align: right;font-weight:bold;font-size:10px;">
										Versi : 1.0.01
											</td>
									</tr>
								</table>
						</div>
<?php } ?>

<!-- konten halaman -->
<div id="center" data-options="region:'center'" style="background: transparent !important;">
	<div id="tabContent" class="easyui-tabs" pill="false" data-options="tools:'#tab-tools'" headerCls="headernya" style="width:100%;height:100%;">
	</div>
</div>

<script language="javascript" type="text/javascript">
	$(window).on('load', function(){
		$('.loading').hide();
	});

	$(document).ready(function() {	
		hideallpanel();	
	});

	function closeAllTab(){
		var count = $('#tabContent').tabs('tabs').length;
		for(var i=count-1; i>=0; i--){
			$('#tabContent').tabs('close',i);
		}
	}	

	function hideallpanel(){
		$('#divmenu').accordion('hidePanel', 1);//Dashboard
		$('#divmenu').accordion('hidePanel', 2);//Kepegawaian
		$('#divmenu').accordion('hidePanel', 3);//Sppd
		$('#divmenu').accordion('hidePanel', 4);//Cuti
		$('#divmenu').accordion('hidePanel', 5);//Absensi
		$('#divmenu').accordion('hidePanel', 6);//Konsumsi
		$('#divmenu').accordion('hidePanel', 7);//Payroll
		$('#divmenu').accordion('hidePanel', 8);//Non Rutin
		$('#divmenu').accordion('hidePanel', 9);//Perpajakan
		$('#divmenu').accordion('hidePanel', 10);//API
		$('#divmenu').accordion('hidePanel', 11);//Master
		$('#divmenu').accordion('hidePanel', 12);//Admin
		$('#divmenu').accordion('hidePanel', 13);//HXMS API
		$('#divmenu').accordion('hidePanel', 14);//SAP API
		$('#divmenu').accordion('hidePanel', 15);//Data Pegawai
	}	

	function showdashboard(){
		hideallpanel();
		<?php if ($jumlah_dashboard > 0) { ?>
								$('#divmenu').accordion('showPanel', 1);//Dashboard
								$('#divmenu').accordion('getPanel',1).panel('expand');
		<?php } ?>
	}

	function showkepegawaian(){		
		hideallpanel();
		<?php if ($jumlah_kepegawaian > 0) { ?>
								$('#divmenu').accordion('showPanel', 2);//Kepegawaian
								$('#divmenu').accordion('getPanel',2).panel('expand');
		<?php } ?>
	}
	
	function showsppd(){
		hideallpanel();
		<?php if ($jumlah_sppd > 0) { ?>
								$('#divmenu').accordion('showPanel', 3);//Sppd
								$('#divmenu').accordion('getPanel',3).panel('expand');
		<?php } ?>
	}
	
	function showcuti(){
		hideallpanel();
		<?php if ($jumlah_cuti > 0) { ?>
								$('#divmenu').accordion('showPanel', 4);//Cuti
								$('#divmenu').accordion('getPanel',4).panel('expand');
		<?php } ?>
	}
	
	function showabsensi(){
		hideallpanel();
		<?php if ($jumlah_absensi > 0) { ?>
								$('#divmenu').accordion('showPanel', 5);//Absensi
								$('#divmenu').accordion('getPanel',5).panel('expand');
		<?php } ?>
	}
	
	function showkonsumsi(){
		hideallpanel();
		<?php if ($jumlah_konsumsi > 0) { ?>
								$('#divmenu').accordion('showPanel', 6);//Konsumsi
								$('#divmenu').accordion('getPanel',6).panel('expand');
		<?php } ?>
	}
	function showpayroll(){
		hideallpanel();
		<?php if ($jumlah_payroll > 0) { ?>
								$('#divmenu').accordion('showPanel', 7);//Payroll
								$('#divmenu').accordion('getPanel',7).panel('expand');
		<?php } ?>
	}	
	function shownonrutin(){
		hideallpanel();
		<?php if ($jumlah_nonrutin > 0) { ?>
								$('#divmenu').accordion('showPanel', 8);//Non Rutin
								$('#divmenu').accordion('getPanel',8).panel('expand');
		<?php } ?>
	}
	function showperpajakan(){
		hideallpanel();
		<?php if ($jumlah_perpajakan > 0) { ?>
								$('#divmenu').accordion('showPanel', 9);//Perpajakan
								$('#divmenu').accordion('getPanel',9).panel('expand');
		<?php } ?>
	}
	function showapi(){
		hideallpanel();
		<?php if ($jumlah_api > 0) { ?>
								$('#divmenu').accordion('showPanel', 10);//API
								$('#divmenu').accordion('getPanel',10).panel('expand');
		<?php } ?>
	}
	function showmaster(){
		hideallpanel();
		<?php if ($jumlah_master > 0) { ?>
								$('#divmenu').accordion('showPanel', 11);//Master
								$('#divmenu').accordion('getPanel',11).panel('expand');
		<?php } ?>
	}
	function showadmin(){
		hideallpanel();
		<?php if ($jumlah_admin > 0) { ?>
								$('#divmenu').accordion('showPanel', 12);//Admin
								$('#divmenu').accordion('getPanel',12).panel('expand');
		<?php } ?>
	}
	function showhxmsapi(){
		hideallpanel();
		<?php if ($jumlah_hxms_api > 0) { ?>
								$('#divmenu').accordion('showPanel', 13);//HXMS API
								$('#divmenu').accordion('getPanel',13).panel('expand');
		<?php } ?>
	}
	function showsapapi(){
		hideallpanel();
		<?php if ($jumlah_sap_api > 0) { ?>
								$('#divmenu').accordion('showPanel', 14);//SAP API
								$('#divmenu').accordion('getPanel',14).panel('expand');
		<?php } ?>
	}
	function showpegawai(){		
		hideallpanel();
		<?php if ($jumlah_pegawai > 0) { ?>
								$('#divmenu').accordion('showPanel', 15);//Kepegawaian
								$('#divmenu').accordion('getPanel',15).panel('expand');
		<?php } ?>
	}

	var refreshSn = function (){
		var time = 600000; // 10 mins
		setTimeout(
				function (){
			$.ajax({
			url: 'refresh_session.php',
			cache: false,
			complete: function () {refreshSn();}
			});
		},
			time
		);
	};
	refreshSn();
</script>
<script type="text/javascript">
	$.extend($.fn.accordion.methods, {
		hidePanel:function(jq, which){
			return jq.each(function(){
				var p = $(this).accordion('getPanel',which);
				p.panel('close').panel('header').removeClass('accordion-header');
				$(this).accordion('resize');
			});
		},
		showPanel:function(jq, which){
			return jq.each(function(){
				var p = $(this).accordion('getPanel',which);
				p.panel('open').panel('header').addClass('accordion-header');
				$(this).accordion('resize');
			});
		}
	})

	$.extend($.fn.tabs.methods,{
		disableTab: function(jq, which){
			return jq.each(function(){
				var tab = $(this).tabs('getTab', which).panel('options').tab;
				tab.addClass('tabs-disabled').unbind('.tabs');
				tab.find('a.tabs-close').unbind('.tabs');
			});
		},
		enableTab: function(jq, which){
			return jq.each(function(){
				var target = this;
				var panel = $(target).tabs('getTab', which);
				var tab = panel.panel('options').tab;
				tab.removeClass('tabs-disabled').unbind('.tabs').bind('click.tabs', {p:panel}, function(e){
					var index = $(target).tabs('getTabIndex', e.data.p);
					$(target).tabs('select', index);
				}).bind('contextmenu.tabs', {p:panel}, function(e){
					var opts = $(target).tabs('options');
					var index = $(target).tabs('getTabIndex', e.data.p);
					opts.onContextMenu.call(target, e, e.data.p.panel('options').title, index);
				});
				tab.find('a.tabs-close').unbind('.tabs').bind('click.tabs', {p:panel}, function(e){
					var index = $(target).tabs('getTabIndex', e.data.p);
					$(target).tabs('close', index);
					return false;
				});
			});
		}
	});
	$.extend($.fn.combobox.defaults.inputEvents, {
		focus: function(e){
			var target = this;
			var len = $(target).val().length;
			setTimeout(function(){
				if (target.setSelectionRange){
					target.setSelectionRange(0, len);
				} else if (target.createTextRange){
					var range = target.createTextRange();
					range.collapse();
					range.moveEnd('character', len);
					range.moveStart('character', 0);
					range.select();
				}
			},0);
		}
	});
	$.extend($.fn.datagrid.methods, {
		getChecked: function(jq){
			var rr = [];
			var rows = jq.datagrid('getRows');
			jq.datagrid('getPanel').find('div.datagrid-cell-check input:checked').each(function(){
				var index = $(this).parents('tr.datagrid-row:first').attr('datagrid-row-index');
				rr.push(rows[index]);
			});
			return rr;
		}
	});
	$.extend($.fn.textbox.defaults, {
		height: 25
	});
	$.extend($.fn.numberbox.defaults, {
		height: 25
	});
	$.extend($.fn.filebox.defaults, {
		height: 25
	});
	$.extend($.fn.combobox.defaults, {
		height: 25
	});
	$.extend($.fn.datebox.defaults, {
		height: 25
	});
	
	function styler1(value,row,index){
		return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
	}

</script>

<script type="text/javascript">
		var index = 0;
		function addPanel(){
			index++;
			$('#tabContent').tabs('add',{
				title: 'Tab'+index,
				content: '<div style="padding:10px">Content'+index+'</div>',
				closable: true
			});
		}
				
		function addPanelnya(filter){
			var datafilter = filter.split("|");
			var namafilter = datafilter[0];
			var urlfilter = datafilter[1];
			var prosesfilter = datafilter[2];
			var viewfilter = datafilter[3];
			//index=21;
						if ($('#tabContent').tabs('exists',namafilter)){
								$('#tabContent').tabs('select',namafilter);
				//var tab = $('#tt').tabs('getSelected');
				//tab.panel('refresh', urlfilter+"?proses="+prosesfilter+"&view="+viewfilter);
						} else {
					$('#tabContent').tabs('add',{
						title: namafilter,
										href: "views/tabs/"+urlfilter+"?proses="+prosesfilter+"&view="+viewfilter,
						closable: true
					});
						}
		}

				
		function gantiPass(){
			index=51;
						if ($('#tabContent').tabs('exists','Ganti Password')){
								$('#tabContent').tabs('select','Ganti Password');
						} else {
					$('#tabContent').tabs('add',{
						title: 'Ganti Password',
										href: "gantipass.php",
						closable: true
					});
						}
		}
</script>

<script type="text/javascript">
		//var nilainya = $('#result2').slider(
		//$("#west").height($(window).height() - 160);
	$("#west").height($(window).height() - 10);
		//$("#menu").height($(window).height() - 160);
		$("#center").height($(window).height() - 500);
		$("#tabContent").height($(window).height() - 87);
		//$("#tt2").height($(window).height() - 390);
		$("#dgdil").height($(window).height() - 117);
		$("#loginnya").width($(window).width() - 5);
		$("#forlogin").height($(window).height() - 155);
		$("#dilnya").height($(window).height() - 472);
	//$("#divmenu").height($(window).height() - 160);
		/*
		$('#west').panel('resize', {
			width:'100%'
			height:'100%'
		})
		*/               
</script>

<script type="text/javascript">
	
		idleMax = 3000;// Logout setelah 60 menit IDLE
		idleTime = 0;
		$(document).ready(function () {
				var idleInterval = setInterval("timerIncrement()", 20000); 
				$(this).mousemove(function (e) {idleTime = 0;});
				$(this).keypress(function (e) {idleTime = 0;});
		})
		function timerIncrement() {
				idleTime = idleTime + 1;
				if (idleTime > idleMax) { 
						window.location="logout.php";
				}
		} 
	$('#tt2').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_dashboard').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_kepegawaian').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_sppd').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_cuti').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_absensi').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_konsumsi').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_payroll').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});
	$('#tt2_perpajakan').tree({
		onClick: function(node){
			$(this).tree('toggle', node.target);
		}
	});

	/*
	function reloadGrafik2(datagrafik){
		index=99999;
		var str_array = datagrafik.split('|');
		var tanggalnya = str_array[0];
		var kd_regionnya = str_array[1];
		var akses_prosesnya = str_array[2];
		var akses_viewnya = str_array[3];
		//alert(kd_regionnya);
		$('#tt').tabs('select','Collection Periode (COP)');
		var p = $('#tt').tabs('getTab', 'Collection Periode (COP)');
		p.panel('refresh',"app/simkoin/cop.php?tanggal="+tanggalnya+"&kd_region="+kd_regionnya+"&proses="+akses_prosesnya+"&view="+akses_viewnya);
	}
				
	function reloadGrafikoutstanding2(datagrafik){
		index=99999;
		var str_array = datagrafik.split('|');
		var blthnya = str_array[0];
		var akses_prosesnya = str_array[1];
		var akses_viewnya = str_array[2];
		$('#tt').tabs('select','Outstanding');
		var p = $('#tt').tabs('getTab', 'Outstanding');
		p.panel('refresh',"app/simkoin/outstanding.php?blth="+blthnya+'&proses='+akses_prosesnya+'&view='+akses_viewnya);
	}
				
	function reloadGrafikpendapatan2(datagrafik){
		index=99999;
		var str_array = datagrafik.split('|');
		var blthnya = str_array[0];
		var akses_prosesnya = str_array[1];
		var akses_viewnya = str_array[2];
		$('#tt').tabs('select','Pendapatan (DPP)');
		var p = $('#tt').tabs('getTab', 'Pendapatan (DPP)');
		p.panel('refresh',"app/simkoin/pendapatan.php?blth="+blthnya+'&proses='+akses_prosesnya+'&view='+akses_viewnya);
	}
				
	function reloadGrafikdperencanaan2(datagrafik){
		index=99999;
		var str_array = datagrafik.split('|');
		var tahunnya = str_array[0];
		var akses_prosesnya = str_array[1];
		var akses_viewnya = str_array[2];
		//alert(tahunnya);
		$('#tt').tabs('select','Dashboard Anggaran');
		var p = $('#tt').tabs('getTab', 'Dashboard Anggaran');
		p.panel('refresh',"dperencanaan.php?tahun="+tahunnya+"&proses="+akses_prosesnya+"&view="+akses_viewnya);
	}
				
	function reloadGrafikdproject2(datagrafik){
		index=99999;
		var str_array = datagrafik.split('|');
		//var tahunnya = str_array[0];
		var akses_prosesnya = str_array[0];
		var akses_viewnya = str_array[1];
		$('#tt').tabs('select','Dashboard Proyek');
		var p = $('#tt').tabs('getTab', 'Dashboard Proyek');
		p.panel('refresh',"dproject.php?proses="+akses_prosesnya+"&view="+akses_viewnya);
		//p.panel('refresh',"dproject.php");
	}
	*/
	//$("#divhistory_pengadaan").height($(window).height() - 200); 
</script>

</body>
</html>
