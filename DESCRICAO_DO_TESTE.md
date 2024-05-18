Considere a seguinte situação:
Você foi contratado para desenvolver um sistema de gerenciamento de funcionários usando PHP e orientação a objetos. O sistema deve permitir a criação de funcionários, atribuição de departamentos, jornada de trabalho (horas) e exibição de informações detalhadas sobre cada funcionário de forma simplificada.

1) Criação de funcionários: Nome, e-mail, cpf, idade, departamento de trabalho

2) Atribuição de departamentos: Criação de novos departamentos dinâmicos e vínculo com funcionários existentes.

3) Jornada de trabalho:
A lista de trabalho deve ser para os próximos 30 dias e cada dia ter 24 horas. Porém, apenas as horas úteis de trabalho devem ser incluídas na lista (9h às 12h e das 13h às 18h com uma pausa para o almoço das 12h às 13h).

- Descreva o processo que você seguiria para criar a lista de horários de trabalho.
    - R:    1 - Criaria uma função que receba a quantidade de dias para definir a lista
            2 - Com a quantidade de dias estabelecido, faria a iteração entre os dias considerando o horário útil estabelecido
            (neste caso 09 -> 12 e 13 -> 18) neste caso está considerando apenas um turno porém passando um tipo poderia
            estabelecer uma lista com vários turnos de trabalhos com diferentes horas úteis de trabalho.
            3 - Ao fim da iteração teria um array com os dias e horas de acordo com o solicitado.

- Explique como você garantiria que apenas as horas úteis de trabalho fossem incluídas na lista.
    - R:    Pelo que eu entendi não há inserção de horas manuais, neste caso basta comparar se a hora do dia correspondente 
            está entre o horário útil (de acordo com o turno caso tenha), e se não é hora de almoço.
- Forneça um exemplo de código em PHP para criar a lista de horários de trabalho e verificar se uma determinada hora é uma hora útil.

Critérios:
- Estrutura de Classes
- Encapsulamento
- Legibilidade e Boas Práticas


Informações gerais do teste:
- Não precisa se preocupar com front, pode usar algo cru.
- Use apenas PHP, HTML, CSS e JS.
- Sinta-se a vontade de usar qualquer framework PHP