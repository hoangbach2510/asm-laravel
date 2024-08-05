
// thong bao loi error
document.addEventListener('DOMContentLoaded', (event) => {
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.style.transition = 'opacity 0.5s ease-out';
            errorAlert.style.opacity = '0';
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 500); // Thời gian cho quá trình mờ dần
        }, 10000); // 10 giây
    }
});
// end thong bao loi error

//them gio hang
function themGioHang(san_pham_id,gia_khuyen_mai){
    var token= document.querySelector("input[name='_token']").value;

    $.ajax({
        type: 'POST',
        url: '/gio-hang/them-gio-hang',
        data: {
            _token: token,
            san_pham_id: san_pham_id,
            gia_khuyen_mai: gia_khuyen_mai
        },
        success: function(response){
            $("#thongbaothemgiohang").fadeIn();
            setTimeout(function() {
                $("#thongbaothemgiohang").fadeOut();
            }, 1500);

        },
        error: function(error) {
            window.location.href= '/tai-khoan/dang-nhap';
        }
    });
}
//end them gio hang

//them gio hang chi tiet
function themGioHangChiTiet(san_pham_id,gia_khuyen_mai){
    var token= document.querySelector("input[name='_token']").value;
    var so_luong=document.getElementById('soLuongChiTiet').value;

    $.ajax({
        type: 'POST',
        url: '/gio-hang/them-gio-hang-chi-tiet',
        data: {
            _token: token,
            san_pham_id: san_pham_id,
            so_luong: so_luong,
            gia_khuyen_mai: gia_khuyen_mai
        },
        success: function(response){
            $("#thongbaothemgiohang").fadeIn();
            setTimeout(function() {
                $("#thongbaothemgiohang").fadeOut();
            }, 1500);

        },
        error: function(error) {
            window.location.href= '/tai-khoan/dang-nhap';
        }
    });
}
//end them gio hang chi tiet

//da nhan hang
function daNhanHang(don_hang_id){
    var token= document.querySelector("input[name='_token']").value;
    $.ajax({
        type: 'PUT',
        url: '/gio-hang/da-nhan-hang/'+don_hang_id,
        data: {
            _token: token,
            id: don_hang_id
        },
        success: function(response){
            $("#thongbaothemgiohang").fadeIn();
            $('#cart-message').text('Cảm ơn bạn đã mua hàng <3.');
            setTimeout(function() {
                $("#thongbaothemgiohang").fadeOut();
            }, 1500);

            $('.btnDaNhan[data-id="' + don_hang_id + '"]').hide();
        },
        error: function(error) {
            console.log(error);

        }
    });
}
//end da nhan hang

//gio hang
$(".qtybutton").on("click", function() {
    var $button = $(this);
    var $input = $button.parent().find("input[name='qtybutton']");
    var oldValue = parseInt($input.val());
    var so_luong_sp = parseInt($button.parent().find("input[name='so_luong_sp']").val());
    var oldGiaKhuyenMai = $button.parent().find("input[name='gia_khuyen_mai']").val();
    var oldThanhTien = $button.parent().find("input[name='thanh_tien']");
    var thanhTienText=$button.parent().parent().parent().find(".thanhTien span");
    if ($button.text() === "+") {
        if (oldValue < so_luong_sp) {
            var newVal = oldValue + 1;
        } else {
            alert('Bạn đã vượt quá số lượng sản phẩm trong kho!');
            var newVal = oldValue;
        }
    } else {
        if (oldValue > 1) {
            var newVal = oldValue - 1;
        } else {
            newVal = 1;
        }
    }
    oldThanhTien.val(parseInt(oldGiaKhuyenMai)*parseFloat(newVal));
    thanhTienText.text((parseInt(oldGiaKhuyenMai)*parseFloat(newVal)).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));
    $input.val(newVal);
    tongthanhtoan();
    var id = $button.parent().find("input[name='id']").val();
    var so_luong=$button.parent().find("input[name='qtybutton']").val();
    var thanh_tien=$button.parent().find("input[name='thanh_tien']").val();
    var token=$button.parent().find("input[name='_token']").val();
    $.ajax({
        type: "PUT",
        url: "/gio-hang/cap-nhat-gio-hang/"+id,
        data: {
            _token: token,
            id: id,
            so_luong: so_luong,
            thanh_tien: thanh_tien
        },
        success: function(response) {

          },
          error: function(error) {
            console.error('Lỗi: ', error);
            alert('Có lỗi xảy ra');
          }
    });
});
function tongthanhtoan(){
    var tong=0;
    var arrTr=document.querySelectorAll(".trgiohang");
    arrTr.forEach(function(element){
        var thanh_tien=element.querySelector("input[name='thanh_tien']").value;
        tong+=parseInt(thanh_tien);
    })
    var tongThanhToanText=document.querySelector("#tongThanhToan");
    tongThanhToanText.innerHTML=tong.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}
//end gio hang

//so luong chi tiet san pham
$(".soLuong").on("click", function() {
    var $button = $(this);
    var $input = $button.parent().find("input[name='soLuong']");
    var oldValue = parseInt($input.val());
    var so_luong_sp = parseInt($button.parent().find("input[name='so_luong_sp']").val());

    if ($button.text() === "+") {
        if (oldValue < so_luong_sp) {
            var newVal = oldValue + 1;
        } else {
            alert('Bạn đã vượt quá số lượng sản phẩm trong kho!');
            var newVal = oldValue;
        }
    } else {
        if (oldValue > 1) {
            var newVal = oldValue - 1;
        } else {
            newVal = 1;
        }
    }

    $input.val(newVal);
});
//end so luong chi tiet

// ajax binh luan

//end ajax binh luan

//don mua

$(document).ready(function(){
    $(".an").hide();
    $("#tap1").fadeIn();
    $(".nav-tab li").click(function(){
        //active nav tabs
        $(".nav-tab li").removeClass("active");
        $(this).addClass("active");

        //Show tap
        let idtap= $(this).children('a').attr('href');
        $(".an").hide();
        $(idtap).fadeIn();
        return false;
    });
});

//end don mua

// loc theo gia

//end loc gia

//Lien he
//ajax lien he

//end ajax lien he
//end lien he
