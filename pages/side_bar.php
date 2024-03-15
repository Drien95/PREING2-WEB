<? require 'header.php' ?>
    <main>
        <aside class="left-nav-wrapper">
            <nav class="left-nav">
                <section class="left-nav__categories">
                   <a href="#">Catégorie 1</a>
                   <a href="#">Catégorie 2</a>
                   <a href="#">Catégorie 3</a>
                   <a href="#">Catégorie 4</a>
                   <a href="#">Catégorie 5</a>
                </section>
                <section class="left-nav__filters">
                    <div class="filter-group">
                        <div class="inline-block">
                            <div class="redirection-button">
                                Sexe
                            </div>
                            <div class="icone">
                                <i class="fa-solid fa-chevron-up"></i>
                            </div>
                        </div>
                        <div class="filter-group__content">
                            <button class="button-filter-group__check">
                                <input type="checkbox" class="button__checkbox">
                                <span class="gender">Hommes</span>
                            </button>
                            <button class="button-filter-group__check">
                                <input type="checkbox" class="button__checkbox">
                                <span class="gender">Femmes</span>
                            </button>
                            <button class="button-filter-group__check">
                                <input type="checkbox" class="button__checkbox">
                                <span class="gender">Mixte</span>
                            </button>
                        </div>

                    </div>
                    <div class="filter-group">
                        <div class="inline-block">
                            <div class="redirection-button">
                                Prix
                            </div>
                            <div class="icone">
                                <i class="fa-solid fa-chevron-up"></i>
                            </div>
                        </div>
                        <div class="price-input">
                            <div class="flex">
                                <div class="field__price">
                                    <input type="number" class="price_max" placeholder="Min">
                                </div>
                                <span>&minus;</span>
                                <div class="field__price">
                                    <input type="number" class="price__min" placeholder="Max">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="inline-block">
                            <div class="redirection-button">
                                Taille
                            </div>
                            <div class="icone">
                                <i class="fa-solid fa-chevron-up"></i>
                            </div>
                        </div>
                        <div class="filter-size">
                            <div class="flex-size">
                                <button class="button__size">38</button>
                                <button class="button__size">39</button>
                                <button class="button__size">40</button>
                                <button class="button__size">41</button>
                                <button class="button__size">42</button>
                                <button class="button__size">43</button>
                                <button class="button__size">44</button>
                                <button class="button__size">45</button>
                               
                            </div>
                        </div>
                    </div>
                    <div class="filter-group"></div>
                    
                </section>

            </nav>
        </aside>
        <section class="center">lorem20000</section>
    </main>
    <footer></footer>
</body>
</html>