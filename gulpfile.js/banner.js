module.exports = {
    banner: function () {
        var banner = {
            full:
                '/*!\n' +
                ' * <%= package.name %> v<%= package.version %>\n' +
                ' * <%= package.description %>\n' +
                ' * (c) ' + new Date().getFullYear() + ' <%= package.author.name %>\n' +
                ' * <%= package.license %> License\n' +
                ' * <%= package.repository.url %>\n' +
                ' */\n\n',
            min:
                '/*!' +
                ' <%= package.name %> v<%= package.version %>' +
                ' | (c) ' + new Date().getFullYear() + ' <%= package.author.name %>' +
                ' | <%= package.license %> License' +
                ' | <%= package.repository.url %>' +
                ' */\n'
        };
        return banner;
    }
};