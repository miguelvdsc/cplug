<?php
                    $query =("SELECT * FROM favoritos A 
					INNER JOIN utilizadores B ON A.idutilizador = B.id
                    INNER JOIN produtos_tamanho C on A.idprod = C.idprod_tam
                    INNER JOIN tamanho D on C.idtam = D.idtamanho
                    INNER JOIN produtos E ON C.idproduto = E.idprod
                    INNER JOIN subcategoria F ON E.categoria = F.id 
                    INNER JOIN genero G ON E.genero=G.id
                    INNER JOIN tipo H ON E.tipo = H.idtipo
                    INNER JOIN saldo I on E.saldo = I.idsaldo
                    WHERE E.estado = 1 AND A.idutilizador=$id LIMIT $offset, $no_of_records_per_page");
                    $arrprodutos=db_query($query);
                    if(isset($arrprodutos[0]))
                    {

                   
                   foreach($arrprodutos as $k => $v)
                   {
                       if($v['tipo']==2)
                       {
                         ?>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                                <span class="label"><?php $desconto = $v['desconto']; echo '-'.$desconto. '%';?></span>
                                    <ul class="product__hover">
                                        <li><a href="javascript:void(0)" onclick="removeFav('<?php echo $v['idprod_tam'];?>','<?php echo $v['idutilizador'];?>')"><img src="img/icon/heart.png" alt=""></a></li>
                                        </li>
                                        <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                       
                                        </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $v['nome']?>  <br>Tamanho: <?php echo $v['nometamanho'] ?></h6>
                                    <a href="#" onclick="setCart('<?php echo $v['idprod_tam'];?>','<?php echo $v['idutilizador'];?>')" class="add-cart">+ Adicionar ao carrinho</a>
                                    
                                    <span><del><?php  $valor = ($v['preço']/((100 - $v['desconto'])/100)); echo number_format($valor, 2, '.', '').'€';?>
                                    </del></span><span></span><h5 style="color:#e53637"><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        <?php
                    }else
                    {

                    ?>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                                    <ul class="product__hover">
                                        <li><a href="javascript:void(0)" onclick="removeFav('<?php echo $v['idprod_tam'];?>','<?php echo $v['idutilizador'];?>')"><img src="img/icon/heart.png" alt=""></a></li>
                                        </li>
                                        <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                       
                                        </ul>
                                </div>
                                <div class="product__item__text">
                                <h6><?php echo $v['nome']?>  <br>Tamanho: <?php echo $v['nometamanho'] ?></h6>
                                    <a href="#" onclick="setCart('<?php echo $v['idprod_tam'];?>','<?php echo $v['idutilizador'];?>')" class="add-cart">+ Adicionar ao carrinho</a>
                                    <h5><?php echo $v['preço'].'.00€' ?></h5>
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                         }
                        }
                        }else
                        {
                            echo '
                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <h6 style="text-align:center;">Ainda não foram adicionados favoritos</h6>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="index.php">Começar a Comprar</a>
                                </div>
                            </div>
                            
                        
                            ';
                        }
    
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                            <?php
                                if(!empty($arrprodutos)){
                                    if($pageno != 1){

                                        
                                            echo '<a href="favoritos.php">1</a>';
                                            
                                            
                                        

                                        if($pageno != 2){

                                            
                                            echo '<a href="/pap/favoritos.php?pageno='.($pageno - 1).'">'.($pageno - 1).'</a>';
                                                
                                        }   
                                    }

                                    

                                    echo '<a class="active" href="#">'.$pageno.'</a>';
                                        
                                    if($pageno!=$total_pages){

                                        
                                        echo '<a href="/pap/favoritos.php?pageno='.($pageno + 1).'">'.($pageno + 1).'</a>';
                                            
                                            
                                    

                                        
                                    
                                    }
                                }
                                
                            ?>
                                <script>
                                function setCart(prodid, uid) {
                                    var xmlhttp=new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            console.log(this.responseText);
                                            
                                        }
                                    };
                                    xmlhttp.open("POST","set_cart.php",true);
                                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    xmlhttp.send("product_id=".concat(prodid,  "&user_id=",uid));
        }
                                </script>
                                <script>
    
                                function removeFav(pid, uid) {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    
                                    };
                                    xmlhttp.open("POST","remove_fav.php",true);
                                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    xmlhttp.send("product_id=".concat(pid, "&user_id=",uid));
                                    location.reload(true);
                                }
                                

                            </script>
                            </div>
                        </div>
                    </div>
                    