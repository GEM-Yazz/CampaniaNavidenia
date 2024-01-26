<main 
    id="app" 
    class="wrap"
    data-site="<?php echo get_site_url(); ?>">
    <h2 class="mb-1">Participantes</h2>
    <a  
        :href="reportsLink" 
        download 
        class="button button-primary mb-1">
        Descargar todo (.xls)
    </a>
    <table class="widefat fixed mb-1" cellspacing="0">
        <thead>
            <tr>
                <th id="columnname" class="manage-column column-columnname" scope="col">ID</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Fecha</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Usuario</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Amigo</th>
                <th id="columnname" class="manage-column column-columnname" scope="col">Politicas</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="(player, index) of players"
                valign="top"
                :class="((index + 1) % 2 == 0) ? 'alternate' : ''">
                <td class="manage-column column-columnname" scope="col">
                    {{player.id}}
                </td>
                <td class="manage-column column-columnname" scope="col">{{ getDateFormated(player.created_at) }}</td>
                <td class="manage-column column-columnname" scope="col">
                    <p> <b>Nombres y apellidos:</b> {{player.firstname}} {{player.lastname}}<br> </p>
                    <p> <b>Edad:</b> {{player.age}}<br> </p>
                    <p> <b>DNI:</b> {{player.dni}}<br> </p>
                    <p> <b>Celular:</b> {{player.phone}}<br> </p>
                    <p> <b>Email:</b> {{player.email}}<br> </p>
                    <p> <b>Ubicación:</b> {{player.department}}, {{player.province}}, {{player.district}}<br> </p>
                </td>
                <td class="manage-column column-columnname" scope="col">
                    <div v-if="player.friend">
                        <p> <b>Nombres y apellidos:</b> {{player.friend.fullname}}<br> </p>
                        <p> <b>Edad:</b> {{player.friend.age}}<br> </p>
                        <p> <b>Parentesco:</b> {{player.friend.relationship}}<br> </p>
                        <p> <b>Sexo:</b> {{player.friend.genre}}<br> </p>
                        <p> <b>Cómo es 1?:</b> {{player.friend.behaviour1}}<br> </p>
                        <p> <b>Cómo es 2?:</b> {{player.friend.behaviour2}}<br> </p>
                        <p> <b>Cómo es 3?:</b> {{player.friend.behaviour3}}<br> </p>
                        <p> <b>Actividad 1:</b> {{player.friend.activity1}}<br> </p>
                        <p> <b>Actividad 2:</b> {{player.friend.activity2}}<br> </p>
                        <p> <b>Actividad 3:</b> {{player.friend.activity3}}<br> </p>
                        <p> <b>Importancia:</b> {{player.friend.importance}}<br> </p>
                        <p> <b>Regalo:</b> {{player.friend.gift}}<br> </p>
                    </div>
                </td>
                <td class="manage-column column-columnname" scope="col">{{ player.politics ? 'Si' : 'No' }}</td>
            </tr>
        </tbody>
    </table>
    <div v-if="isMoreParticipants" class="flex-container align-center">
        <button class="button button-secondary" @click="getPlayers()">Load more...</button>
    </div>
</main>
