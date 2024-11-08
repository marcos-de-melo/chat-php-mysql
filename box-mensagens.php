
                <?php
                session_start();
                $usuarioLogado = $_SESSION["usuarioLogado"];
                include("./db/conexao.php");
                $sql = "SELECT 
                u.idUsuario,
                imgAvatarUsuario,
                nickname,
                mensagem,
                date_format(dataHora,'%d/%m/%Y  %H:%i:%s') as dataHora 
                FROM tbmensagens as m inner join tbusuarios as u on m.idUsuario = u.idUsuario";
                $rs = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {
                    $idUsuario = $dados["idUsuario"];
                    $imgAvatarUsuario = $dados["imgAvatarUsuario"];
                    $nickname = $dados["nickname"];
                    $msg = $dados["mensagem"];
                    $dataHora = $dados["dataHora"];
                    $classBoxMsg = ($usuarioLogado == $idUsuario) ? "msg-you" : "msg-others";
                ?>
                    <article class="msg-box <?= $classBoxMsg ?>">
                        <img class="logo-avatar" width="50" 
                        src="<?= $imgAvatarUsuario ?>" 
                        alt="Avatar">
                        <div>
                            <h2><?= $nickname ?></h2>
                            <p><?= $msg ?></p>
                            <p class="msg-time"><?= $dataHora ?></p>
                        </div>
                    </article>
                <?php
                }
                ?>
       
            