<table style="border: solid 1px #661FFF;">
    <tr>
        <th style="background: #661FFF; color: white;">ID</th>
        <th style="background: #661FFF; color: white;">Fecha</th>
        <th style="background: #661FFF; color: white;">
            <table>
                <thead>
                    <tr>
                        <th style="background: #0064ec; color: white;" colspan="10">Participante</th>
                    </tr>
                    <tr>
                        <th style="background: #2984ff; color: white;">Nombres</th>
                        <th style="background: #2984ff; color: white;">Apellidos</th>
                        <th style="background: #2984ff; color: white;">DNI</th>
                        <th style="background: #2984ff; color: white;">Celular</th>
                        <th style="background: #2984ff; color: white;">E-mail</th>
                        <th style="background: #2984ff; color: white;">Edad</th>
                        <th style="background: #2984ff; color: white;">Departamento</th>
                        <th style="background: #2984ff; color: white;">Provincia</th>
                        <th style="background: #2984ff; color: white;">Distrito</th>
                        <th style="background: #2984ff; color: white;">¿Politicas?</th>
                    </tr>
                </thead>
            </table>
        </th>
        <th style="background: #FF3C41; color: white;">
            <table>
                <thead>
                    <tr>
                        <th style="background: #FF3C41; color: white;" colspan="12">Compañero</th>
                    </tr>
                    <tr>
                        <th style="background: #ff5c60; color: white;">Nombres y apellidos</th>
                        <th style="background: #ff5c60; color: white;">Edad</th>
                        <th style="background: #ff5c60; color: white;">Parentesco</th>
                        <th style="background: #ff5c60; color: white;">Sexo</th>
                        <th style="background: #ff5c60; color: white;">¿Como 1?</th>
                        <th style="background: #ff5c60; color: white;">¿Como 2?</th>
                        <th style="background: #ff5c60; color: white;">¿Como 3?</th>
                        <th style="background: #ff5c60; color: white;">Actividad 1</th>
                        <th style="background: #ff5c60; color: white;">Actividad 2</th>
                        <th style="background: #ff5c60; color: white;">Actividad 3</th>
                        <th style="background: #ff5c60; color: white;">Importancia</th>
                        <th style="background: #ff5c60; color: white;">Regalo</th>
                    </tr>
                </thead>
            </table>
        </th>
    </tr>
    <tbody>
        <?php 
            $index = 0;

            foreach($players as $player) { 
                $bg     = ( $index % 2 == 0 ) ? '#EEE8F6' : 'white';
                $site = get_site_url();
        ?>
            <tr>
                <td style="background: <?php echo $bg; ?>;"><?php echo $player->id ?></td>
                <td style="background: <?php echo $bg; ?>;"><?php echo $player->created_at ?></td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->firstname ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->lastname ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->dni ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->phone ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->email ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->age ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->department ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->province ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->district ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo ($player->politics) ? 'Si' : 'No' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td v-if="player.friend">
                    <table>
                        <tbody>
                            <tr>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->fullname ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->age ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->relationship ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->genre ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->behaviour1 ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->behaviour2 ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->behaviour3 ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->activity1 ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->activity2 ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->activity3 ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->importance ?></td>
                                <td style="background: <?php echo $bg; ?>;"><?php echo $player->friend->gift ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php $index++; } ?>
    </tbody>
</table>
