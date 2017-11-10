<template>
    <div class="container">
        <div class="columns">
            <div class="column">

                <table class="table table is-bordered is-fullwidth">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USD</th>
                            <th>EUR</th>
                            <th>GBP</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody v-for="currency in currencies">
                        <tr>
                            <td v-text="currency.id"></td>
                            <td v-text="currency.usd"></td>
                            <td v-text="currency.eur"></td>
                            <td v-text="currency.gbp"></td>
                            <td v-text="">{{currency.created_at | time_format }}</td>


                        </tr>
                    </tbody>
                </table>

                <pagination
                    :current="pagination.current"
                    :total="pagination.total"
                    :itemsPerPage="pagination.itemsPerPage"
                    :onChange="this.onChange">
                 </pagination>

            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Currency from '../models/Currency';
    import Pagination from 'vue-2-bulma-pagination';

    export default {

        components: { Pagination },

        data() {
            return {
                currencies: {},

                pagination: {
                    current: 1,       // Current page
                    total: 0,         // Items total count
                    itemsPerPage: 10  // Items per page
                },
            }
        },

        created() {
            this.loadCurrencies();
            setInterval(() => { this.onChange(this.pagination.current) }, 60000);

        },

        methods: {
            loadCurrencies() {
                Currency.all().then(({currencies, total}) => {
                    this.currencies = currencies;
                    this.pagination.total = total;
                });
            },

            onChange(page) {
                Currency.limit(10, page).then(({currencies, total}) => {
                    this.currencies = currencies;
                    this.pagination.current = page;
                });
            }

        },

        filters: {
            time_format(data) {
                return moment(data).format('LTS');
            },

        }
    }
</script>
