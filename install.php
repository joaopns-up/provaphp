<?php
namespace App;

use \PDOException;

use App\Dal\Conn;

class Database {
    public static function createDatabase() {
        $queries = [
            'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";',
            'START TRANSACTION;',
            'SET time_zone = "+00:00";',
                       
            'DROP TABLE IF EXISTS comentario;',
            'CREATE TABLE IF NOT EXISTS comentario (
              id int NOT NULL AUTO_INCREMENT,
              nomeImagem varchar(100) NOT NULL,
              autor varchar(50) NOT NULL,
              texto varchar(250) NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;',
            

            "INSERT INTO comentario (id, nomeImagem, autor, texto) VALUES
            (2, 'pacman_v1.jpg', 'Jo&atilde;o Silva', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit a voluptas optio molestias dolores officiis inventore. Ex minima temporibus quo quae reprehenderit ut corrupti dicta ad veniam, consequuntur, id distinctio!'),
            (3, 'pacman_v2.jpg', 'Maria Oliveira', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio eius ullam voluptas nobis odit quidem sequi earum officia corporis id, suscipit saepe quibusdam officiis quasi voluptate placeat accusamus! Soluta, nobis?'),
            (4, 'pacman_v3.jpg', 'Pedro Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, aspernatur? Non quo facilis sint consectetur laborum, cupiditate animi reprehenderit dolorem reiciendis commodi deserunt doloribus eius libero illo neque nisi aliquam.'),
            (5, 'pacman_v2.jpg', 'Jo&atilde;o Oliveira', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio eius ullam voluptas nobis odit quidem sequi earum officia corporis id, suscipit saepe quibusdam officiis quasi voluptate placeat accusamus! Soluta, nobis?'),
            (6, 'pacman_v3.jpg', 'Maria Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, aspernatur? Non quo facilis sint consectetur laborum, cupiditate animi reprehenderit dolorem reiciendis commodi deserunt doloribus eius libero illo neque nisi aliquam.'),
            (7, 'pacman_v1.jpg', 'Pedro Silva', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit a voluptas optio molestias dolores officiis inventore. Ex minima temporibus quo quae reprehenderit ut corrupti dicta ad veniam, consequuntur, id distinctio!');",
                       
           ' DROP TABLE IF EXISTS orcamento;',
            'CREATE TABLE IF NOT EXISTS orcamento (
              id int NOT NULL AUTO_INCREMENT,
              nome varchar(150) NOT NULL,
              email varchar(200) NOT NULL,
              telefone varchar(20) NOT NULL,
              duracao int NOT NULL,
              local varchar(200) NOT NULL,
              tipoEvento varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
              impresso tinyint(1) NOT NULL,
              qtdeFotos int NOT NULL,
              observacoes text NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;',
            
            "INSERT INTO orcamento (id, nome, email, telefone, duracao, local, tipoEvento, impresso, qtdeFotos, observacoes) VALUES
            (2, 'Jos&eacute; Silva', 'jose@silva.com', '41987654321', 10, 'Universidade Positivo', 'externo', 1, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio eius ullam voluptas nobis odit quidem sequi earum officia corporis id, suscipit saepe quibusdam officiis quasi voluptate placeat accusamus! Soluta, nobis?');",
            
            'DROP TABLE IF EXISTS portfolio;',
            'CREATE TABLE IF NOT EXISTS portfolio (
              id int NOT NULL AUTO_INCREMENT,
              caminhoImagem varchar(250) NOT NULL,
              textoImagem varchar(250) NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;',

            "INSERT INTO portfolio (id, caminhoImagem, textoImagem) VALUES
            (2, 'img/portfolio/6676da51bbb77.jpg', 'Imagem 1'),
            (3, 'img/portfolio/6676da5fbf9e3.jpg', 'Imagem 2'),
            (4, 'img/portfolio/6676da6c00a6c.jpg', 'Imagem 3'),
            (5, 'img/portfolio/6676da7f3977c.jpg', 'Imagem 4'),
            (6, 'img/portfolio/6676da8c291c2.jpg', 'Imagem 5'),
            (7, 'img/portfolio/6676da995f52f.jpg', 'Imagem 6'),
            (8, 'img/portfolio/6676daa68e34f.jpg', 'Imagem 7'),
            (9, 'img/portfolio/6676dab22a396.jpg', 'Imagem 8'),
            (10, 'img/portfolio/6676dabe96dab.jpg', 'Imagem 9');",

            'DROP TABLE IF EXISTS slideshow;',
            'CREATE TABLE IF NOT EXISTS slideshow (
              id int NOT NULL AUTO_INCREMENT,
              caminhoImagem varchar(250) NOT NULL,
              textoImagem varchar(250) NOT NULL,
              titulo varchar(100) NOT NULL,
              descricao varchar(250) NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;',

           "INSERT INTO slideshow (id, caminhoImagem, textoImagem, titulo, descricao) VALUES
            (12, 'img/slideshow/6676cc18bd049.jpg', 'Primeira imagem', 'Priemiro T&iacute;tulo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, asperiores veritatis dicta non placeat ducimus perspiciatis rem, qui doloribus explicabo ipsam omnis fugit, voluptas tenetur at facere officiis velit illum.'),
            (11, 'img/slideshow/6676cbce4da5c.jpg', 'Segunda imagem', 'Segundo T&iacute;tulo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, asperiores veritatis dicta non placeat ducimus perspiciatis rem, qui doloribus explicabo ipsam omnis fugit, voluptas tenetur at facere officiis velit illum.'),
            (13, 'img/slideshow/6676cf76ad711.jpg', 'Terceira Imagem', 'Terceira Imagem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, asperiores veritatis dicta non placeat ducimus perspiciatis rem, qui doloribus explicabo ipsam omnis fugit, voluptas tenetur at facere officiis velit illum.'),
            (14, 'img/slideshow/66785478100f0.jpg', 'Imagem 1', 'Quarte teste', 'teste');",
            
            'DROP TABLE IF EXISTS usuario;',
            'CREATE TABLE IF NOT EXISTS usuario (
              id int NOT NULL AUTO_INCREMENT,
              nome varchar(150) NOT NULL,
              email varchar(200) NOT NULL,
              senha varchar(200) NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;',

            'INSERT INTO usuario (id, nome, email, senha) VALUES
            (4, "Aluno", "aluno@prova.com", "$argon2i$v=19$m=65536,t=4,p=1$QzA0U21uVUhhV25BR1ZRWQ$N0m1r5oH9FFSUY66J6ySjGQOpMhx0WEZx/vV3336r7w");
            COMMIT;',

        ];

        try {
            $conn = conn::getConn();
            foreach ($queries as $query) {
                $conn->exec($query);
            }
            echo "Database and tables created successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

Database::createDatabase();

$currentFile = __FILE__;

// Apaga o arquivo
if (unlink($currentFile)) {
    echo "<br> Arquivo apagado com sucesso";
} else {
    echo "<br> Erro ao apagar o arquivo";
}
?>
