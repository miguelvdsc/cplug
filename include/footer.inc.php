<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="img/logo.jpg" alt=""></a>
                        </div>
                        <p>A satisfação do cliente é a nossa metedologia de trabalho.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Menu</h6>
                        <ul>
                        <?php
                        $query="SELECT * FROM rodape WHERE estado=1 ORDER BY ordem";
                        $arrRodape=db_query($query);
                        
                        foreach($arrRodape as $v)
                        {

                            echo '<li><a href="'.$v['link'].'">'.$v['menu'].'</a></li>';
            
                        }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                        <?php
                        $query="SELECT * FROM rodape WHERE estado=1 ORDER BY ordem";
                        $arrRodape=db_query($query);
                        
                        foreach($arrRodape as $v)
                        {

                            echo '<li><a href="'.$v['link2'].'">'.$v['info'].'</a></li>';
            
                        }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Sê o primeiro a saber das nossas promoções</p>
                            <?php
                                if (isset($_POST['emailnewsletter'])) {
                                    newsletter();
                                }
                             ?>
                            <form action="" method="POST">
                                <input type="email" id="emailnewsletter" name="emailnewsletter" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>
    <?php
function newsletter(){

    $email = $_POST['emailnewsletter'];
    $data = date("Y-m-d H:i:s");
    $titulo = "Subscreveu a nossa Newsletter a ".$data." !";

    $assunto = "<html><head></head><body><h1 style='text-align:center; color:#111111'>A CPlug agradece a sua confiança e disponibilidade para receber as novidades sobre o mundo da moda. Fique atento!</h1><img src='https://i.ibb.co/GFPwBv4/logo.jpg' alt='' /><p style='text-align:left; color:black; font-weight:bold'>© Copyright 2021 Todos os direitos reservados. CPlug by Miguel Carvalho</p></body></html>";

    $envio = 'From: cplugwebstore@gmail.com' . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf-8';

    $query = "SELECT email FROM newsletter WHERE estado = 1";
    $emails = db_query($query);

    if(!$emails==null){
        foreach($emails as $v){
            if ($v['email'] == $email){
                return false;
            }
        }
    }

    if(mail($email,$titulo,$assunto,$envio)){
        db_query("INSERT INTO newsletter (email, data, estado) VALUES ('$email', '$data', 1)");
        return true;
    }
    else{
        return false;
    }



}
    ?>