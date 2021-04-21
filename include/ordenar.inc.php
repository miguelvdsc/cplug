<?php
$url = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['searchViewType'])) {
    $_SESSION['searchViewType'] = 1;
}
if(isset($_GET['tipo'])) {
    $_SESSION['searchViewType'] = $_GET['tipo'];
}
if(!isset($_SESSION['searchOrderType'])) {
    $_SESSION['searchOrderType'] = 0;
}

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