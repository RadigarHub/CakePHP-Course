<?php
    echo $this->Form->control('first_name', ['label' => 'Nombre']);
    echo $this->Form->control('last_name', ['label' => 'Apellidos']);
    echo $this->Form->control('email', ['label' => 'Correo electrónico']);
    echo $this->Form->control('password', ['label' => 'Contraseña', 'value' => '']);
?>