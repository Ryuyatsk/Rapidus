<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/20
 * Time: 0:47
 */

$routingFile = <<< EOF
import React from 'react';
import {StackNavigator, TabNavigator, DrawerNavigator, NavigationActions} from 'react-navigation';
import HomeView from './Views/HomeView';

export const RootStack = StackNavigator({
    Home: {
        screen: HomeView,
    },
});

EOF;


class Heredoc
{
    public function getRouting()
    {
        global $routingFile;
        return $routingFile;
    }

    public function getComponent(string $componentName)
    {
        $componentFile = <<< EOF
import React from 'react';
import {Text, View, Image, StyleSheet, TouchableOpacity} from 'react-native';

export default class {$componentName} extends React.Component {
    static navigationOptions = {
        headerTitle: <Text style={{flex: 1, fontSize: 18, textAlign: 'center'}}>{$componentName}</Text>,
        headerTitleStyle: {
            alignSelf: 'center'
        },
        tabBarVisible: true,
    };

    render() {
        return (
            <View style={styles.container}>
                <Text>Sample</Text>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
    }, header: {
        flex: 1,
        fontSize: 18,
    },
});

EOF;

        return $componentFile;
    }

    public function getRepository(string $repositoryName)
    {
        $repositoryFile = <<< EOF
import axios from 'axios';

export default class {$repositoryName} {
    constructor(This) {
        this.this = This;
    }

    onClick() {
        axios.get('')
            .then(function (response) {
                let res = new Object(response['data']);
                this.this.setState({"res": res});
            }.bind(this));
    }
}

EOF;

        return $repositoryFile;
    }

    public function getView(string $viewName)
    {
        $componentFile = <<< EOF
import React from 'react';
import {Text, View, Image, StyleSheet, TouchableOpacity} from 'react-native';

export default class {$viewName} extends React.Component {
    static navigationOptions = {
        headerTitle: <Text style={{flex: 1, fontSize: 18, textAlign: 'center'}}>{$viewName}</Text>,
        headerTitleStyle: {
            alignSelf: 'center'
        },
        tabBarVisible: true,
    };

    render() {
        return (
            <View style={styles.container}>
                <Text>Sample</Text>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
    }, header: {
        flex: 1,
        fontSize: 18,
    },
});

EOF;

        return $componentFile;
    }

}


