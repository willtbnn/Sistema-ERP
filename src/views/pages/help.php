<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
])
;?>
<div class="container mt-5 pt-5">
    <div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Clientes</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Agendamentos</a>
            <?php if($loggedUser->funcao == 'Desenvolvedor' || $loggedUser->funcao == 'Coordenador'):?>
            <a class="nav-link" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="false">Adicionar Usuários</a>
            <a class="nav-link" id="v-pills-fun-tab" data-toggle="pill" href="#v-pills-fun" role="tab" aria-controls="v-pills-fun" aria-selected="false">Funcionarios</a>
            <a class="nav-link" id="v-pills-calendar-tab" data-toggle="pill" href="#v-pills-calendar" role="tab" aria-controls="v-pills-calendar" aria-selected="false">Calendario</a>
            <a class="nav-link" id="v-pills-config-tab" data-toggle="pill" href="#v-pills-config" role="tab" aria-controls="v-pills-config" aria-selected="false">Configuração</a>
            <?php endif;?>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <h2>Pagina Inicial </h2>
            <p>Aqui ainda estamos trabalhando em atualizações.</p>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <h2>Pagina Clientes </h2>
                <p>Você quantos clientes estão vingulador a você funcionário, podendo editar as informações do mesmo. </p>
                
                Se estiver aparecendo algum número igual esse <span title="Informações que faltam" class="badge badge-danger">3</span>, significa que tem informações faltando no cliente o número é a quantidade de informação necessários para completa o envio de todos os dados necessários do cliente.
                <h2>Adicionando Clientes </h2>
                <p>Temos 3 informações indispensavel para pode adicionar seu cliente ao sistema e os superiores pode coletar os dados, <b>Nome, E-mail, Telefone do Cliente. </b></p>
                <p>Essas são informações indispensaveis para podemos entra em contato com o mesmo caso necessários. </p>
                <p><b>São únicas informações que não podem ser incluída depois. </b> </p>
                <p><b>Foto RG </b> -> Tenta tirar da forma mais nítida possível, tire em lugares claro e configure a câmera para tirar sem flash para evita o reflexo da luz. </p>
                <p><b>Foto do CPF </b> -> Tenta tirar dar forma mais nítida possível, tire em lugares claro e configure a câmera para tirar sem flash para evita o reflexo da luz. <i>Essa só será necessária caso o RG não contenha os números do CPF do cliente. </i></p>
                <p><b>Foto do cliente </b> -> Tenta tirar da forma mais nítida possível, tire em lugares claro. Tente tirar como se fosse um documento em fundo claro ou lugares claros, e de uma distância media 1,5 m de distância do cliente. </p>
                <p><b>Foto Extrato </b> -> Tenta tirar da forma mais nítida possível, tire em lugares claro e configure a câmera para tirar sem flash para evita o reflexo da luz. </p>
                <p><b>Comprovante de residência </b> -> Tenta tirar da forma mais nítida possível, tire em lugares claro e configure a câmera para tirar sem flash para evita o reflexo da luz. </p>
                <p><b>Espelho </b> -> Tenta tirar da forma mais nítida possível, tire em lugares claro e configure a câmera para tirar sem flash para evita o reflexo da luz. </p>
                <p><b>Comentário</b> ->Essa informação e totalmente opcional. </p>
                <p><b>Comprovante de residência </b> -> Tenta tirar da forma mais nítida possível, tire em lugares claro e configure a câmera para tirar sem flash para evita o reflexo da luz. </p>
                <p><b>Conversa Whatsapp.txt </b> -> Aqui tem que ser arquivo .txt, va no Whatsapp e inporte a conversa, salve no seu aparelho celular/computador e anexa aqui.</p>
                <p></p>
                <ul>
                    <li> Pressione os três pontos (mais opções), ao lado da lupa;</li>
                    <li>Selecione “Configurações”;</li>
                    <li>Clique em “Conversas”;</li>
                    <li>“Histórico de conversas”;</li>
                    <li>Selecione “Exportar conversa”;</li>
                    <li>Em seguida, escolha qual conversa você pretende exportar;</li>
                    <li>Escolha entre exportar “sem mídia” ou “incluir arquivos de mídia”;</li>
                    <li>Selecione salva no seu drive;</li>
                    <li>Depois baixe do drive para seu aparalho celular/computador;</li>
                    <li>Faça o envio desse arquivo no campo aqui no sistema</li>
                </ul>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <h2>Agendamentos </h2>
            <p>Você verá quantos agendamentos estão vingulado a você, podendo editar as informações do mesmo. </p>
           
            <h2>Adicionando Agendamentos </h2>
            <p>Todos os Campos são necessários ser preenchidos para o envio de agendamentos. </b></p>
            <p><b>Nome do Cliente </b> -> Coloque o nome completo do cliente, para podemos comunicar da forma melhor possível com o cliente. </p>
            <p><b>Data Marcada </b> -> Essa informação e indispensável está correta para podemos monitora e repassando dinheiro de passagem </i></p>
            <p><b>Hora Marcada </b> -> Hora que você marcou para se encontra com o cliente. </p>
            <p><b>Cep </b> -> Aqui importante o CEP de onde marcou de se encontra com o cliente, se você colocar o cep correto as outras informações serão preenchidas, se houver algum erro você poderá edita-las. </p>
            <p><b>Rua/Número/Bairro/Cidade/Estado/Complemento </b> -> de onde você marcou de se encontra com o cliente. </p>
            <p><b>E-mail/Telefone do cliente </b> -> essa informação indispensável para podemos entra em contato com o cliente caso necessário. </p>
            <p><b>Custo de locomoção</b> -> Para podemos ressasilo de gasto com passagem essa informação tem que esta corretamente preenchida. </p>
        </div>
        <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
            <h2>Adicionar Usuário. </h2>
            <p> <b>Para usar o sistema.</b></p>
            <p><b>Únicos campos obrigatórios são senha e e-mail e cargo do usuário. </b> -> Coloque o nome completo do cliente, para podemos comunicar da forma melhor possível com o cliente. </p>
            <p class="badge badge-primary text-wrap text-uppercase"><b>ATENÇÃO </b> -> e a parti do cargo que nivelamos o acesso do usuário. </p>
            <p><b>Coordenador </b> -> Acesso irrestrito ao sistema. </p>
            <p><b>Gerente</b>-> Acesso até atual versão irrestrito. </p>
            <p><b> Funcionário </b> -> Acesso somente a Página inicial sem ver os usuários do sistema, agendamento podendo ver somente os criado por ele, Adicionar cliente agendamento podendo ver somente os criado por ele.  </p>
        </div>
        <div class="tab-pane fade" id="v-pills-fun" role="tabpanel" aria-labelledby="v-pills-fun-tab">
        <h2>Funcionários cadastrados. </h2>
        <p> <b>Para cria um perfil na página de equipe para o funcionário. </b></p>
        <p><b>Aqui todos os campos são obrigatórios. </b></p>
        <p><b>ATENÇÃO </b> -> e a parti do cargo que nivelamos o acesso do usuário. </p>
        <p><b>Nome completo</b> -> coloque o nome do funcionário conforme o documento de identificação do mesmo. </p>
        <p><b>Nome abreviado </b>-> nome e sobrenome do mesmo, conforme o mesmo gosta de abrevia. </p>
        <p><b> E-mail </b> -> não é permitido e-mail já existente.  </p>
        <p><b>Celular </b> -> que o funcionário usa para se comunicar com o cliente caso seja pode ser um ramal. </p>
        <p><b>Cargo</b> -> cargo que o mesmo ocupa na empresa. </p>
        <p><b>Data de nascimento </b> Não é permitido data não valida. </p>
        <p><b>Foto </b> -> padrão crachá, da cintura para cima com topo de 3 cm de passagem para melhora aproxima no redimensionamento da foto que o sistema faz de <i>960x1280 pixels. </i></p>
        <p><b>RG/CPF </b> dois primeiros números e dois últimos números do RG e CPF do funcionário. </p>
        <p><b>Edita funcionário </b> ->
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
        </svg>
        Aqui poderá edita/atualizar qualquer informação do funcionário e será sincronizado com a o perfil dele na pagina equipe do site da empresa.
        </p>
        <p> <b>Excluir funcionário </b> ->
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-x-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                </svg>
        Cuidado só clique no confirma se tiver certeza que deseja excluir funcionário da equipe da empresa.
        </p>


        </div>
        <div class="tab-pane fade" id="v-pills-calendar" role="tabpanel" aria-labelledby="v-pills-calendar-tab">Calendario</div>
        <div class="tab-pane fade" id="v-pills-config" role="tabpanel" aria-labelledby="v-pills-config-tab">Configuração</div>
        </div>
    </div>
    </div>
</div>
</div>
<p class="text-right">Atualizado versão 1.0.1</p>
<?=$render('footer');?>