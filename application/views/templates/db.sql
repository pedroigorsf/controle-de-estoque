-- Tabela de Produtos
CREATE TABLE tab_produtos (
    id_produto INT PRIMARY KEY,
    nome_produto VARCHAR(50),
    udm VARCHAR(10),
    tipo_produto VARCHAR(30)
);

-- Tabela de Fornecedores
CREATE TABLE tab_fornecedores (
    id_fornecedor INT PRIMARY KEY,
    nome_fornecedor VARCHAR(50),
    cnpj VARCHAR(20),
    telefone VARCHAR(20),
    email VARCHAR(50)
);

-- Tabela de Produtos no Estoque
CREATE TABLE tab_produtos_estoque (
    id_produto_estoque INT PRIMARY KEY,
    fk_produto INT,
    udm VARCHAR(20),
    fk_fornecedor INT,
    lote VARCHAR(20),
    dta_compra DATETIME,
    dta_validade DATETIME,
    FOREIGN KEY (fk_produto) REFERENCES tab_produtos(id_produto),
    FOREIGN KEY (fk_fornecedor) REFERENCES tab_fornecedores(id_fornecedor)
);

-- Tabela de Usuários
CREATE TABLE tab_usuarios (
    id_usuario INT PRIMARY KEY,
    login VARCHAR(50),
    senha VARCHAR(150),
    tipo_acesso VARCHAR(15) -- Alterei o tamanho para adequar "admin/almoxarife"
);

-- Tabela de Movimentações
CREATE TABLE tab_movimentacoes (
    id_movimento INT PRIMARY KEY,
    tipo_movimento VARCHAR(10), -- Alterei o tamanho para adequar "Entrada/Saída"
    fk_produto_estoque INT,
    dta_movimento DATETIME,
    fk_usuario INT,
    FOREIGN KEY (fk_produto_estoque) REFERENCES tab_produtos_estoque(id_produto_estoque),
    FOREIGN KEY (fk_usuario) REFERENCES tab_usuarios(id_usuario)
);

-- Tabela de Vendas
CREATE TABLE tab_vendas (
    id_venda INT PRIMARY KEY,
    cliente VARCHAR(120),
    fk_movimento INT,
    dta_venda DATETIME,
    FOREIGN KEY (fk_movimento) REFERENCES tab_movimentacoes(id_movimento)
);