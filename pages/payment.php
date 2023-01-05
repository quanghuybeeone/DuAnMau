<?php include_once("../part/header.php") ?>
    <div class="container row">
        <section class="section-22">
            <div class="swapper-1 row">
                <div class="content-1">Thanh toán</div>
                <div id="map" class="map col-7 col-sm-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.346429809698!2d106.6017744074023!3d10.78475675645967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c723e829f37%3A0xc800f5b0a75b3e69!2zMTkvMTMgTGnDqm4gS2h1IDItMTAsIELDrG5oIEjGsG5nIEhvw6AgQSwgQsOsbmggVMOibiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1665570353186!5m2!1sen!2s"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="label">Organic Farm</div>
                    <div class="info"><strong>Địa Chỉ:</strong> 19/13 Liên Khu 2-10, Bình Hưng Hoà A, Bình Tân, Thành
                        phố Hồ Chí Minh
                    </div>
                    <div class="info"><strong>Email:</strong> organicfarm@gmail.com</div>
                    <div class="info"><strong>Hotline:</strong> 123-456-7890</div>
                    <div class="info"><strong>CSKH:</strong> 123-456-7890</div>
                    <div class="info"><strong>Fax:</strong> 123-456-7890</div>
                </div>
                <div class="content-2 col-5 col-sm-12">
                    <form action="">
                        <div class="label">Giải đáp thắc mắc</div>
                        <div class="form-group">
                            <div>Họ Tên:</div>
                            <input type="text" pattern="^.* .*$" placeholder="Vui lòng nhập họ tên"
                                title="Không có kí tự đặt biệt" required>
                        </div>
                        <div class="form-group">
                            <div>Số điện thoại:</div>
                            <input name="tel1" type="tel" pattern="[0-9]{10,11}"
                                placeholder="Vui lòng nhập số điện thoại gồm 10-11 chữ số"
                                title="Vui lòng nhập số điện thoại gồm 10-11 chữ số" required />
                        </div>
                        <div class="form-group">
                            <div>Email:</div>
                            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                placeholder="Vui lòng nhập email" title="Vui lòng nhập đúng định dạng email" required>
                        </div>
                        <div class="form-group">
                            <div>Nội dung cần giải đáp:</div>
                            <textarea name="" id="" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group"><button>Gửi</button></div>
                    </form>
                </div>
            </div>
        </section>
    </div>
<?php include_once("../part/footer.php") ?>