<div class="dialog">
    
    <?php if ($erro != ''):?>    
    <div class="error">
        <p>
            <span class="ui-icon ui-icon-alert"></span>
            <strong>Alerta:</strong>
            <?php echo $erro?>
        </p>
    </div>
    <?php endif;?>
    <?php if ($msg != ''):?>    
    <div class="success">
        <p>
            <span class="ui-icon ui-icon-circle-check"></span>
            <strong>Sucesso:</strong>
            <?php echo $msg?>
        </p>
    </div>
    <?php endif;?>
    
</div>
<header id="head">
    <h1>Banners</h1>
    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Data</th>
        <!--<th>Link</th>-->
        <th>Imagem</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($banners) > 0):
            foreach ($banners as $banner):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $banner->ban_data?></td>
            <!--<td><?php echo $banner->ban_link?></td>-->
            <td><span class="img"><img src="<?= base_url() ?>public/uploads/banners/<?php echo $banner->ban_imagem?>" width="100" height="50" alt="" /></span></td>
            <td>
                <a href="<?= site_url('gerenciador/banners/editar/'.$banner->ban_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/banners/excluir/'.$banner->ban_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
            </td>
        </tr>
      <?php 
            endforeach;
        endif;
      
      ?> 
    </tbody>
</table>

<footer id="foot">
    <nav class="paginacao">
        <?php echo $this->pagination->create_links()?>
    </nav>
<!--    <nav class="batch">-->
<!--        <a href="#" class="ico-bin" title="Apagar Selecionados">Apagar Selecionados</a>-->
<!--    </nav>-->
</footer>