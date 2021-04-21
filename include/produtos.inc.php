<?php 
$offset=0;
$limitprod=12;
$queryprod =("SELECT * FROM produtos A 
INNER JOIN subcategoria B ON A.categoria = B.id 
INNER JOIN genero C ON A.genero=C.id
INNER JOIN tipo D ON A.tipo = D.idtipo
INNER JOIN saldo E on A.saldo = E.idsaldo
INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
INNER JOIN tamanho G on F.idtam=G.idtamanho 
WHERE A.estado = 1 GROUP BY A.idprod LIMIT $offset,$limitprod");  
$arrprodutosindex=db_query($queryprod);
foreach ($arrprodutosindex as $k => $v) {
    if($v['tipo']==4)
    {

    
?>

    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals active">
        <div class="product__item">
            <div  class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                <span class="label">New</span>
                <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                    <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><?php echo $v['nome'] ?></h6>
                <a href="#" class="add-cart">+ Adicionar ao Carrinho</a>
                <div class="rating">
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <h5><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
                <div class="product__color__select">
                    <label for="pc-1">
                        <input type="radio" id="pc-1">
                    </label>
                    <label class="active black" for="pc-2">
                        <input type="radio" id="pc-2">
                    </label>
                    <label class="grey" for="pc-3">
                        <input type="radio" id="pc-3">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    else if($v['tipo']==3)
    {
    ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers">
                    <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                        <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                    <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $v['nome'] ?></h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
   }
   else if($v['tipo']==2)
   {
       ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item sale">
                    <div  class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                    <span class="label"><?php $desconto = $v['desconto']; echo '-'.$desconto. '%';?></span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $v['nome'] ?></h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span><del><?php  $valor = ($v['preço']/((100 - $v['desconto'])/100)); echo number_format($valor, 2, '.', '').'€';?>
                                    </del></span><span></span><h5 style="color:#e53637"><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
                            <div class="product__color__select">
                                <label for="pc-16">
                                    <input type="radio" id="pc-16">
                                </label>
                                <label class="active black" for="pc-17">
                                    <input type="radio" id="pc-17">
                                </label>
                                <label class="grey" for="pc-18">
                                    <input type="radio" id="pc-18">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

       <?php
   }
}
?>
