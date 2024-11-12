// console.log("hieu12");
const info_ctm = document.getElementById("info_ctm")
console.log(info_ctm);

const hero_side = document.getElementById("hero-side")
const full_name = "<?php echo $data_Custm['full_name']?>";
// const full_Name = "<?php echo $data_Custm['full_name']; ?>"; // Lưu giá trị vào biến JavaScript
console.log(hero_side);

// console.log(info_ctm);
info_ctm.addEventListener("click", (e) => {
    // console.log("day thogn thong tin");
    sc = info_ctm.getAttribute("success");
    // sc = "false";
    // console.log(sc);
    // const data = await listUser();
    // console.log(data);
    if(sc){
     hero_side.innerHTML = `
        <form action="?act=post_info" method="POST">
        <div>
            Họ và tên
            <input type="text" name="full_name" id class="form-control" placeholder
                aria-describedby="helpId" value = "${full_name}">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>            Số điện thoại
            <input type="text" name="phone" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Địa chỉ
            <input type="text" name="address" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Giới tính
            <input type="text" name="gender" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Sinh nhật
            <input type="text" name="date_of_birth" id class="form-control"
                placeholder aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Tổng tiền tích lũy
            <input type="text" name id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Hạng thành viên
            <input type="text" name id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Đổi mật khẩu
            <input type="text" name id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <button type="submit">Cập nhật</button>
    </form>
        `
    }else {
        hero_side.innerHTML =
        `
        <form action="?act=post_info" method="POST">
        <div>
            Họ và tên
            <input type="text" name="full_name" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Số điện thoại
            <input type="text" name="phone" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Địa chỉ
            <input type="text" name="address" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Giới tính
            <input type="text" name="gender" id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Sinh nhật
            <input type="text" name="date_of_birth" id class="form-control"
                placeholder aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Tổng tiền tích lũy
            <input type="text" name id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Hạng thành viên
            <input type="text" name id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div>
            Đổi mật khẩu
            <input type="text" name id class="form-control" placeholder
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <button type="submit">Thêm mới</button>
    </form>
        `
    }
   
})

