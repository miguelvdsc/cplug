<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$url = $_SERVER['REQUEST_URI'];

$product_ID = $_POST['product_id'];
$user_ID = $_POST['user_id'];
$size_ID = $_POST['size_id'];


?>
                            <?php
                              
                              
                               
                                if(isset($_SESSION['login_ok']))
                                {
                                    if($size_ID==0){
                                    
                                    ?>
                                
                                <a href="javascript:void(0);" id="setcart" onclick="alert('Escolha um tamanho');" class="primary-btn">Adicionar ao carrinho</a>
                                <?php
                                }else
                                {
                                    $query1 =("SELECT * FROM produtos_tamanho A 
                                    INNER JOIN produtos B ON A.idprod_tam = B.idprod
                                    INNER JOIN subcategoria C ON B.categoria = C.id 
                                    INNER JOIN genero D ON B.genero=D.id
                                    INNER JOIN tipo E ON B.tipo = E.idtipo
                                    INNER JOIN saldo F on B.saldo = F.idsaldo
                                    WHERE E.estado = 1 AND A.idtam=$size_ID AND A.idproduto=$product_ID");
                                    $arrfindprodtam=db_query($query1);
                        
                                    $prod_tam=$arrfindprodtam[0]['idprod_tam'];
                                    ?>
                                <a href="javascript:void(0);" id="setcart" onclick="setCart('<?php echo $prod_tam;?>','<?php echo $user_ID;?>')" class="primary-btn">Adicionar ao carrinho</a>
                                
                                    <?php
                                }
                                }else 
                                {
                                    
                                    ?>
                                    <a href="login.php" class="primary-btn">Adicionar ao carrinho</a>
                                    <?php
                                }
                                ?>
                            </div>
                            <p></p>
                            <?php
                            $query123 =("SELECT * FROM produtos A 
                            INNER JOIN subcategoria B ON A.categoria = B.id 
                            INNER JOIN genero C ON A.genero=C.id
                            INNER JOIN fotos D on A.idprod=D.idprodf
                            INNER JOIN saldo E on A.saldo = E.idsaldo
                            INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
                            INNER JOIN tamanho G on F.idtam=G.idtamanho 
                            WHERE A.estado = 1 AND A.idprod=$product_ID"); 
                            $arrprod=db_query($query123);

                            
                            ?>
                            <div class="product__details__btns__option">
                            <?php
                             
                        
                            if(isset($_SESSION['login_ok']))
                            {
                            $idut=$_SESSION['id'];
                            if($size_ID!=0){
                            $query1 =("SELECT * FROM produtos_tamanho A 
                            INNER JOIN produtos B ON A.idprod_tam = B.idprod
                            INNER JOIN subcategoria C ON B.categoria = C.id 
                            INNER JOIN genero D ON B.genero=D.id
                            INNER JOIN tipo E ON B.tipo = E.idtipo
                            INNER JOIN saldo F on B.saldo = F.idsaldo
                            WHERE E.estado = 1 AND A.idtam=$size_ID AND A.idproduto=$product_ID");
                            $arrfindprodtam=db_query($query1);

                            $prod_tam=$arrfindprodtam[0]['idprod_tam'];

                             $count="SELECT count(*) as 'num_favorites' FROM favoritos WHERE idprod=$prod_tam AND idutilizador=$idut";
                             $arrcount=db_query($count);
                             foreach($arrcount as $v){
                             if($v['num_favorites'] > 0  )
                             {
                                 echo '<i id=favorite class="fa fa-heart">';
                             }else
                             {
                              echo '<i id=favorite class="fa fa-heart-o">';
                             }
                            }
                        
                            ?>
                                <a href="javascript:void(0)" id="setfavorite" onclick="setFavorite('<?php echo $prod_tam;?>','<?php echo $user_ID;?>')">
                                
                                <?php
                                }
                                 }else
                                 {
                                     ?>
                                     <i id=favorite class="fa fa-heart-o"> <a href="login.php"></i> Favoritos</a>
                                     
                                     <?php
                                     exit();
                                 }
                                
                                if($size_ID==0){
                                    ?>
                                    <i id=favorite class="fa fa-heart-o"> <a href="javascript:void(0);" onclick="alert('Escolha um tamanho');" ></i> Favoritos</a>
                                <?php
                                }else{
                                ?>
                                
                                
                                </i> Favoritos</a>
                               <?php
                                }
                               ?>

                            </div>
                            <script src="js/main.js"></script>