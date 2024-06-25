# Assistência Veicular API

## Pré-requisitos

Antes de iniciar, certifique-se de que você tem o seguinte instalado:

- **Laravel:** 9.x
- **PHP:** 8.0+
- **MySQL**
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- Um servidor local como [Apache] ou [xampp]


### 🔧 Instalação

## Configuração Inicial

### Passo 1: Clonar o Repositório

```
git clone https://github.com/luciana-pessoa/assistencia-veicular.git

cd assistencia-veicular
```
### Passo 2: Instalar Dependências
Certifique-se de ter o Composer instalado. Em seguida, execute:

```
composer install
```
## Passo 3: Configurar o Arquivo .env
Copie o arquivo .env.example para .env e configure suas credenciais do banco de dados.
.env.example .env

Edite o arquivo .env e atualize as seguintes linhas com suas credenciais:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=assistencia_veicular
DB_USERNAME=root
DB_PASSWORD=secret

```
### Passo 4: Gerar a Chave da Aplicação
```
php artisan key:generate
```
### Passo 5: Configurar o JWT
```
php artisan jwt:secret
```
### Passo 6: Executar Migrações e Seeders
```
php artisan migrate --seed
```
## Executando a Aplicação
Para iniciar o servidor de desenvolvimento, execute:

```
php artisan serve
```
A aplicação estará disponível em http://localhost:8000.

# Endpoints
### Autenticação
### POST /api/login
• Autenticação de usuário.

•	Body:
```
{
  "email": "user@example.com",
  "password": "password"
}
```
•	 Response:
```

{
  "token": "jwt_token",
  "user": "username"
}
```
### Listar Serviços
### GET /api/servicos
•	Listar serviços disponíveis.
•	Headers:
css
```
Authorization: Bearer {jwt_token}
```
•	Response:
```
[
  {
    "id": 1,
    "nome": "Reboque",
    "situacao": "ativo"
  },
  ...
]
```
### Buscar Coordenadas
### GET /api/geocode/{endereco}
•   Buscar coordenadas de um endereço.
•	Headers:
```
Authorization: Bearer {jwt_token}
```
•	Response:
```
{
  "latitude": -23.5505,
  "longitude": -46.6333
}
```
### Buscar Prestadores
### POST /api/prestadores
•   Buscar prestadores de serviço.
•	Headers:
```
Authorization: Bearer {jwt_token}
```
•	Body:
```
{
  "origem": {
    "latitude": -23.5505,
    "longitude": -46.6333
  },
  "destino": {
    "latitude": -22.9083,
    "longitude": -43.1964
  },
  "servico_id": 1,
  "quantidade": 5
}
```
•	Response:
```
[
  {
    "id": 1,
    "nome": "José",
    "distancia_total": 100,
    "valor_total": 150.00
  },
  ...
]
```
### Postman
## Testes
Para executar os testes, use o seguinte comando:
```
php artisan test
```
## Scripts de Seeder
Aqui está o código para os seeders necessários:
```
```
### // database/seeders/DatabaseSeeder.php
```
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PrestadorSeeder::class,
            ServicoSeeder::class,
            ServicoPrestadorSeeder::class,
        ]);
    }
}
```
// database/seeders/PrestadorSeeder.php
```
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestador;

class PrestadorSeeder extends Seeder
{
    public function run()
    {
        Prestador::factory()->count(25)->create();
    }
}
```
// database/seeders/ServicoSeeder.php
```
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicoSeeder extends Seeder
{
    public function run()
    {
        $servicos = [
            ['nome' => 'Reboque', 'situacao' => 'ativo'],
            ['nome' => 'Chaveiro', 'situacao' => 'ativo'],
            ['nome' => 'Mecânico', 'situacao' => 'ativo']
        ];

        foreach ($servicos as $servico) {
            Servico::create($servico);
        }
    }
}
```
 // database/seeders/ServicoPrestadorSeeder.php
```

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;

class ServicoPrestadorSeeder extends Seeder
{
    public function run()
    {
        $prestadores = Prestador::all();
        $servicos = Servico::all();

        foreach ($prestadores as $prestador) {
            foreach ($servicos as $servico) {
                ServicoPrestador::create([
                    'prestador_id' => $prestador->id,
                    'servico_id' => $servico->id,
                    'km_saida' => rand(10, 50),
                    'valor_saida' => rand(20, 100),
                    'valor_km_excedente' => rand(5, 20)
                ]);
            }
        }
    }
}
```
### Conclusão

Se precisar de mais detalhes ou ajuda com alguma parte específica do projeto, estarei à disposição! 
Feito com ❤️ por Luciana Pessoa 👋🏽 

