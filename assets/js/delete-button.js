            $(document).ready(function(){
                $(".delete-button").on('click', (function(){
                    var liId = this.id;            
                    $("li").remove(`.li-${liId}`);
                }));
            });
                        
