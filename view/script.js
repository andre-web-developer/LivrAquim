<script type="text/javascript">
               var precoprevio = 0;
               
                function update(id_livro) {
                    var select = this.document.getElementById('quantidade'+id_livro);
                    var preco = this.document.getElementById('precovenda'+id_livro);
                    if(select.value!=0){
                        if(document.getElementById('mostratotalitem'+id_livro).style.display=="block"){
                            valorAnterior = document.getElementById('precototalitem'+id_livro).value;
                            document.getElementById('precototalitem'+id_livro).value = (select.value*preco.value).toFixed(2);
                            valorAtual=(select.value*preco.value).toFixed(2);
                            if(valorAnterior>=valorAtual){
                                precoprevio = precoprevio - (valorAnterior-valorAtual);
                                document.getElementById('precoprevio').value = precoprevio;
                            }
                            else{
                                precoprevio = (precoprevio + (valorAtual-valorAnterior));
                                document.getElementById('precoprevio').value = precoprevio;
                            }
                        }
                        else{
                            document.getElementById('mostratotalitem'+id_livro).style.display = "block";
                            document.getElementById('precototalitem'+id_livro).value = (select.value*preco.value).toFixed(2); 
                            precoprevio = precoprevio + parseFloat(document.getElementById('precototalitem'+id_livro).value);
                            document.getElementById('precoprevio').value = precoprevio;
                        }        
                    }
                    else{
                        document.getElementById('mostratotalitem'+id_livro).style.display = "none";
                        precoprevio = precoprevio - parseFloat(document.getElementById('precototalitem'+id_livro).value);
                        document.getElementById('precototalitem'+id_livro).value = (select.value*preco.value).toFixed(2);
                        document.getElementById('precoprevio').value = precoprevio;
                    }
                }      
		</script>