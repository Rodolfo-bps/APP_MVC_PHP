<section class="full-box nav-lateral">
    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
    <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
            <i class="far fa-times-circle show-nav-lateral"></i>
            <img src="<?= SERVERURL ?>vistas/assets/avatar/avatar2.jpg" class="img-fluid" alt="Avatar">
            <figcaption class="roboto-medium text-center">
                Rodolfo Velazquez <br><small class="roboto-condensed-light">Web Developer</small>
            </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
            <ul>
                <li>
                    <a href="<?= SERVERURL ?>home/"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?= SERVERURL ?>client-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>client-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>client-search/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar cliente</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Items <i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?= SERVERURL ?>item-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar item</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>item-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de items</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>item-search/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar item</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Préstamos <i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?= SERVERURL ?>reservation-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo préstamo</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>reservation-reservation/"><i class="far fa-calendar-alt fa-fw"></i> &nbsp; Reservaciones</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>reservation-pending/"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Préstamos</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>reservation-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Finalizados</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>reservation-search/"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar por fecha</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?= SERVERURL ?>user-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>user-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
                        </li>
                        <li>
                            <a href="<?= SERVERURL ?>user-search/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= SERVERURL ?>company/"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Empresa</a>
                </li>
            </ul>
        </nav>
    </div>
</section>