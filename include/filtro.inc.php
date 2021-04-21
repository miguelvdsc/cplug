<?php
@session_start();
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
if(isset($_GET['marca']))
{
$marca=$_GET['marca'];
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

<div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                           
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="#">Men (20)</a></li>
                                                    <li><a href="#">Women (20)</a></li>
                                                    <li><a href="#">Bags (20)</a></li>
                                                    <li><a href="#">Clothing (20)</a></li>
                                                    <li><a href="#">Shoes (20)</a></li>
                                                    <li><a href="#">Accessories (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                            
                                                <ul>
                                               
                                                <?php
                                                $query =("SELECT * FROM produtos A 
                                                INNER JOIN subcategoria B ON A.categoria = B.id 
                                                INNER JOIN genero C ON A.genero=C.id
                                                INNER JOIN tipo D ON A.tipo = D.idtipo
                                                INNER JOIN marca E on A.marca=E.idmarca
                                                INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
                                                INNER JOIN tamanho G on F.idtam=G.idtamanho
                                                WHERE A.estado = 1 AND B.categoria= '$ctgr' AND C.genero='$genero' GROUP BY E.idmarca ORDER BY E.ordem ");
                                                $arrfiltros=db_query($query);
                                                

                                                foreach($arrfiltros as $v)
                                                {
                                                    echo'<div class="form-check">';
                                                    echo'<input class="form-check-input" type="checkbox" value="" id="'.$v['nomemarca'].'">';
                                                    echo'<label class="form-check-label" for="'.$v['nomemarca'].'">';
                                                    echo $v['nomemarca'];
                                                    echo'</label>';
                                                    echo'</div>';
                                                   
                                                }
                                                ?>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                <?php
                                                $query =("SELECT * FROM produtos A 
                                                INNER JOIN subcategoria B ON A.categoria = B.id 
                                                INNER JOIN genero C ON A.genero=C.id
                                                INNER JOIN tipo D ON A.tipo = D.idtipo
                                                INNER JOIN cor E on A.cor=E.idcor
                                                INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
                                                INNER JOIN tamanho G on F.idtam=G.idtamanho 
                                                WHERE A.estado = 1 AND B.categoria= '$ctgr' AND C.genero='$genero' GROUP BY E.idcor ORDER BY E.ordem ");
                                                
                                                $arrfiltros2=db_query($query);
                                                

                                                foreach($arrfiltros2 as $v2)
                                                {
                                                    echo'<div class="form-check">';
                                                    echo'<input class="form-check-input" type="checkbox" value="" id="'.$v2['nomecor'].'">';
                                                    echo'<label class="form-check-label" for="'.$v2['nomecor'].'">';
                                                    echo $v2['nomecor'];
                                                    echo'</label>';
                                                    echo'</div>';
                                                   
                                                }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                            <?php
                                            $query =("SELECT * FROM produtos A 
                                            INNER JOIN subcategoria B ON A.categoria = B.id 
                                            INNER JOIN genero C ON A.genero=C.id
                                            INNER JOIN tipo D ON A.tipo = D.idtipo
                                            INNER JOIN produtos_tamanho E on A.idprod=E.idproduto
                                            INNER JOIN tamanho F on E.idtam=F.idtamanho 
                                            WHERE A.estado = 1 AND B.categoria= '$ctgr' AND C.genero='$genero' GROUP BY F.idtamanho ORDER BY F.ordem");
                                           
                                            $arrfiltros3=db_query($query);


                                            foreach($arrfiltros3 as $v3)
                                            {
                                            ?>
                                                <label for="<?php echo $v3['nometamanho'] ?>"><?php echo $v3['nometamanho'] ?>
                                                    <input type="checkbox" id="<?php echo $v3['nometamanho'] ?>">
                                                </label>
                                                <?php
                                            }
                                            ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>