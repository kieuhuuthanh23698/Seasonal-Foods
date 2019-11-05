<div class="slider">
    <div class="images">
        <div>
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/7.png"/>
        </div>
        <div>
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/12.png"/>
        </div>
        <div>
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/2.png"/>
        </div>
        <div>
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/3.png"/>
        </div>
        <div style="width: 20%" class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/4.png"/>
        </div>
        <div class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/5.png"/>
        </div>
        <div class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/9.png"/>
        </div>
        <div class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/11.png"/>
        </div>
        <div class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/8.png"/>
        </div>
        <div style="width: 30%" class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/7.png"/>
        </div>
        <div class="fadeInRight animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/8.png"/>
        </div>
        <div style="width: 20%" class="fadeInRight animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/6.png"/>
        </div>
        <div style="width: 20%" class="fadeInLeft animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/5.png"/>
        </div>
        <div style="width: 20%" class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/12.png"/>
        </div>
        <div class="fadeInDown animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/2_01.png"/>
        </div>
        <div style="width: 20%" class="fadeInRight animated">
            <img width="100%" src="<?php echo base_url() ?>public/images/slider/11.png"/>
        </div>
        
    </div>
    <img width="100%" src="<?php echo base_url() ?>public/images/banner/white.png"/>
    <div class="banner-content container contact-heading">
        <div>
            <h1 class="fadeInLeft animated">Liên Hệ</h1>
            <p>Cám ơn bạn đã ghé thăm Seasonal Foods, liên hệ với chúng tôi nếu các bạn có bất cứ câu hỏi hay ý kiến hữu ích nào</p>
        </div>
        
    </div>
</div>
<style>
    .slider{
        overflow: hidden;
        position: relative;
    }
    .images{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        transform: rotate(45deg);
        position: absolute;
        left: 40%;
        top: -60%;
    }
    .images div{
        width: 25%;
        padding: 15px;
        box-sizing: border-box;
    }
    .images img{
        border: 4px solid #fff;
        box-shadow: 3px 3px 10px gray;
        border-radius: 3px;
    }
    .contact-heading{
        padding-top: 20%;
    }
</style>
<div class="contact-content padding">
    <h1 class="text-center">Thông Tin Seasonal Foods</h1>
    <p class="text-center">Nơi cung cấp những thực phẩm tốt nhất đến tay người tiêu dùng</p>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 contact-form">
                <form>
                    <input type="text" name="username" placeholder="Your name"/>
                    <input type="text" name="phone" placeholder="Phone number"/>
                    <textarea name="message" placeholder="Message" rows="9"></textarea>
                    <input type="submit" class="send-btn" value="Send"/>
                </form>
            </div>
            <div class="col-md-6 contact-map">
                <div id="map" style="width:100%;height:400px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.056848429503!2d106.62643781395138!3d10.806958061586528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752be27d8b4f4d%3A0x92dcba2950430867!2zVHLGsOG7nW5nIMSQYcyjaSBob8yjYyBDw7RuZyBuZ2hp4buHcCBUaOG7sWMgcGjhuqltIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaA!5e0!3m2!1svi!2s!4v1558718363109!5m2!1svi!2s" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="contact-address">
                    <p><span>Address: </span>Thành Phố Hồ Chí Minh</p>
                    <p><span>E-Mail: </span>seasonalfoods@gmail.com</p>
                    <p><span>Phone: </span>09999999999</p>
                </div>
                
            </div>
        </div>
    </div>
</div>

<style>
    .contact-form{
        padding-top: 15px;
    }
    .contact-form input, .contact-form textarea{
        width: 100%;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        border: 1px solid gray;
    }
    .send-btn{
        background-color: #3b9f5e;
        color: #ffffff;
        font-weight: 500;
    }
    .contact-map{
        padding: 20px;
    }
    .contact-address{
        margin-top: 20px;
    
    }
    .contact-address p{
        margin: 5px;
    }
    .contact-address span{
        font-weight: 500;
    }
</style>
<script>
    $(function(){
        $("header").addClass("header-fix");
    });
</script>