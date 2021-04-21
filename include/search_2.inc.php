<?php
// ------------------------
// parametros desta página
$numMinChar = 2;
$numMinTexto = 200;
$flag_erro=0;
// ------------------------
$arrURL = explode('&', $_SERVER['REQUEST_URI']);
$url = $arrURL[0];
if(!isset($_SESSION['searchViewType'])) {
    $_SESSION['searchViewType'] = 1;
}
if(isset($_GET['tipo'])) {
    $_SESSION['searchViewType'] = $_GET['tipo'];
}
if(!isset($_SESSION['searchOrderType'])) {
    $_SESSION['searchOrderType'] = 0;
}

$arrSearch = explode(' ', $_GET['query']);
foreach($arrSearch as $k => $v) {
    if(strlen($v) < $numMinChar) {
        unset($arrSearch[$k]);
        $flag_erro = 1;
    }
}
$arrCampos = array ('A.nome', 'B.categoria', 'C.genero');
$strSearch = '';
foreach($arrCampos as $campo) {
    foreach($arrSearch as $key) {
        $strSearch .= $campo . ' LIKE ' . "'%" . $key . "%' OR ";
    }
   
}
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 

$strSearch = substr($strSearch, 0, strlen($strSearch) - 4);
$total_pages_sql = "SELECT COUNT(*) FROM produtos A 
INNER JOIN subcategoria B ON A.categoria = B.id 
INNER JOIN genero C ON A.genero=C.id 
INNER JOIN tipo D ON A.tipo = D.idtipo
WHERE  $strSearch ";


$result = db_query($total_pages_sql);

$total_rows = $result[0]['COUNT(*)'];
$total_pages = ceil($total_rows / $no_of_records_per_page);

switch($_SESSION['searchOrderType']) {
    case 0: $strSearchOrderBy = '';
            break;
    case 1: $strSearchOrderBy = 'ORDER BY A.preço ASC';
            break;
    case 2: $strSearchOrderBy = 'ORDER BY A.preço DESC';
            break;
}
?>
<div class="col-lg-9">
<div class="shop__product__option">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="shop__product__option__left">
                <p></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
<div class="shop__product__option__right">
 
    <form action="<?php echo $arrSETTINGS['url_site']; ?>/include/order.inc.php" method="post">
        <input type="hidden" name="url" value="<?php echo $url; ?>">
        <select name="order" id="order" onchange="this.form.submit()">
        
            <option value="0" <?php echo ( $_SESSION['searchOrderType'] == 0 ? 'selected="selected"' : ''); ?>>Selecione uma ordenação</option>
            <option value="1" <?php echo ( $_SESSION['searchOrderType'] == 1 ? 'selected="selected"' : ''); ?>>Crescente</option>
            <option value="2" <?php echo ( $_SESSION['searchOrderType'] == 2 ? 'selected="selected"' : ''); ?>>Decrescente</option>
        </select>
    </form>
</div>
</div>
    </div>
</div>
<div class="row">
<?php
$query = "SELECT * FROM produtos A 
INNER JOIN subcategoria B ON A.categoria = B.id 
INNER JOIN genero C ON A.genero=C.id 
INNER JOIN tipo D ON A.tipo = D.idtipo
INNER JOIN saldo E on A.saldo = E.idsaldo
INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
INNER JOIN tamanho G on F.idtam=G.idtamanho 
WHERE  $strSearch  AND A.estado = 1 GROUP BY A.idprod $strSearchOrderBy  LIMIT $offset, $no_of_records_per_page";

$arrPesquisa = db_query($query);

if($flag_erro) {
    echo '<p>Na pesquisa, as palavras têm de ter um número mínimo de '.$numMinChar.' caracteres. Nesta pesquisa existem palavras nesta situação que foram removidas.</p>';
}

if($arrPesquisa) {
    
    foreach($arrPesquisa as $k => $v)
                   {
                       if($v['tipo']==2)
                       {
                         ?>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                                <span class="label"><?php $desconto = $v['desconto']; echo '-'.$desconto. '%';?></span>
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        </li>
                                        <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                       
                                        </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $v['nome']?></h6>
                                    <a href="#" class="add-cart">+ Adicionar ao carrinho</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <span><del><?php  $valor = ($v['preço']/((100 - $v['desconto'])/100)); echo number_format($valor, 2, '.', '').'€';?>
                                    </del></span><span></span><h5 style="color:#e53637"><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
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
                    }else
                    {

                    ?>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        </li>
                                        <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                       
                                        </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $v['nome']?></h6>
                                    <a href="#" class="add-cart">+ Adicionar ao carrinho</a>
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
}
                        
   
}
else echo 'Não existem resultados para a pesquisa.';
?>

</div>