# Google Cloud Storage Image Upload

Este projeto é uma aplicação Laravel que permite fazer upload de imagens para o Google Cloud Storage e exibi-las publicamente. É uma excelente adição ao seu portfólio e demonstra suas habilidades em integrar Laravel com serviços de cloud.

## Funcionalidades

- Upload de arquivos de imagem para o Google Cloud Storage
- Exibição de imagens carregadas usando URLs públicas
- Validação de arquivos para garantir que apenas imagens sejam carregadas

## Requisitos

- Docker
- Docker Compose
- Conta no Google Cloud Platform com um bucket configurado
- Credenciais de chave de conta de serviço do Google Cloud Storage

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    cd seu-repositorio
    ```

2. Coloque o arquivo JSON da chave da conta de serviço no caminho especificado no `.env` (`storage/app/seu-arquivo.json`).

3. Configure o arquivo `.env`:

    ```bash
    cp .env.example .env
    ```

   Atualize o arquivo `.env` com suas credenciais e configurações do Google Cloud:

    ```env
    GOOGLE_CLOUD_PROJECT_ID=seu-project-id
    GOOGLE_CLOUD_KEY_FILE_PATH=storage/app/seu-arquivo.json
    GOOGLE_CLOUD_STORAGE_BUCKET=seu-bucket
    ```

4. Construir e iniciar os contêineres:

    ```bash
    docker-compose up --build
    ```

5. Acesse a aplicação no navegador:

    ```
    http://localhost:8000/upload
    ```

## Uso

1. Navegue até a página de upload (`/upload`).
2. Selecione uma imagem para carregar.
3. Clique no botão "Upload".
4. Veja a imagem carregada exibida na mesma página com uma URL pública.

## Estrutura do Projeto

- `app/Http/Controllers/GcsUploadController.php`: Controlador responsável pelo upload e geração da URL pública da imagem.
- `resources/views/upload.blade.php`: View para o formulário de upload e exibição das imagens.
- `routes/web.php`: Definições de rotas para a aplicação.

## Contribuição

Se você quiser contribuir com este projeto, sinta-se à vontade para abrir um pull request ou relatar um problema.



## Contato

Para mais informações, entre em contato:

- Caio Dias
- caio.lorenzon.dias@gmail.com
- [Linkedin](https://www.linkedin.com/in/caio-cesar-lorenzon-dias/)
- [GitHub](https://github.com/CaioCLDias)
