var btn_themnv = $('.btn-themnv')
var btn_them = $('.btn-them');
var show_success = $('.modal-sc')
var show_them = $('.modal-them')


btn_them.click(function(){
    show_success.show();
    show_them.hide();
})

var btn_close = $('.btn_close')
btn_close.click(function(){
    show_success.hide();
})

btn_themnv.click(function(){
    show_them.show();
})

var dashboard = $('#dashboard')
var nhanvien = $('.nhanvien')
var sanpham = $('#sanpham')
var taikhoan = $('#taikhoan')
var donban = $('#donban')
var khachhang = $('.khachhang')

var hddashboard = $('#hddashboard')
var hdnhanvien = $('.hdnhanvien')
var hdsanpham = $('#hdsanpham')
var hdtaikhoan = $('#hdtaikhoan')
var hddonban = $('#hddonban')
var hdkhachhang = $('.hdkhachhang')

$("#dashboard").show();

hdnhanvien.click(function(){
    
    dashboard.hide();
    nhanvien.show();
    sanpham.hide();
    taikhoan.hide();
    donban.hide();
    khachhang.hide();
    console.log('jkeifhja')
    // $('#contents').load('./nhanvien.php')
    // $('#contents').innerHTML = "Xin chào JavaScript!";
    // window.location = ('./nhanvien.php')
})

hdsanpham.click(function(){
    dashboard.hide();
    nhanvien.hide();
    sanpham.show();
    taikhoan.hide();
    donban.hide();
    khachhang.hide();
})
hdtaikhoan.click(function(){
    dashboard.hide();
    nhanvien.hide();
    sanpham.hide();
    taikhoan.show();
    donban.hide();
    khachhang.hide();
})

hddonban.click(function(){
    dashboard.hide();
    nhanvien.hide();
    sanpham.hide();
    taikhoan.hide();
    donban.show();
    khachhang.hide();
})

hdkhachhang.click(function(){
    dashboard.hide();
    nhanvien.hide();
    sanpham.hide();
    taikhoan.hide();
    donban.hide();
    khachhang.show();
})

$("#dashboard").click(function() {
    $("#contents").load('./model/dashboard.php');
});

// xoa

$('.btn-mydel').click(function(){
    $('.modal-del').show();
})

$('.btn_del_close').click(function(){
    $('.modal-del').hide();
})