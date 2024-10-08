<?php
namespace Aws\ApiGatewayV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonApiGatewayV2** service.
 * @method \Aws\Result createApi(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createApiAsync(array $args = [])
 * @method \Aws\Result createApiMapping(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createApiMappingAsync(array $args = [])
 * @method \Aws\Result createAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAuthorizerAsync(array $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @method \Aws\Result createDomainName(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDomainNameAsync(array $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @method \Aws\Result createIntegrationResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createIntegrationResponseAsync(array $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createModelAsync(array $args = [])
 * @method \Aws\Result createRoute(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRouteAsync(array $args = [])
 * @method \Aws\Result createRouteResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRouteResponseAsync(array $args = [])
 * @method \Aws\Result createStage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createStageAsync(array $args = [])
 * @method \Aws\Result createVpcLink(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createVpcLinkAsync(array $args = [])
 * @method \Aws\Result deleteAccessLogSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAccessLogSettingsAsync(array $args = [])
 * @method \Aws\Result deleteApi(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApiAsync(array $args = [])
 * @method \Aws\Result deleteApiMapping(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApiMappingAsync(array $args = [])
 * @method \Aws\Result deleteAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAuthorizerAsync(array $args = [])
 * @method \Aws\Result deleteCorsConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCorsConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @method \Aws\Result deleteDomainName(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDomainNameAsync(array $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @method \Aws\Result deleteIntegrationResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteIntegrationResponseAsync(array $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @method \Aws\Result deleteRoute(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRouteAsync(array $args = [])
 * @method \Aws\Result deleteRouteRequestParameter(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRouteRequestParameterAsync(array $args = [])
 * @method \Aws\Result deleteRouteResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRouteResponseAsync(array $args = [])
 * @method \Aws\Result deleteRouteSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRouteSettingsAsync(array $args = [])
 * @method \Aws\Result deleteStage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteStageAsync(array $args = [])
 * @method \Aws\Result deleteVpcLink(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteVpcLinkAsync(array $args = [])
 * @method \Aws\Result exportApi(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise exportApiAsync(array $args = [])
 * @method \Aws\Result resetAuthorizersCache(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resetAuthorizersCacheAsync(array $args = [])
 * @method \Aws\Result getApiResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getApiResourceAsync(array $args = [])
 * @method \Aws\Result getApiMapping(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getApiMappingAsync(array $args = [])
 * @method \Aws\Result getApiMappings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getApiMappingsAsync(array $args = [])
 * @method \Aws\Result getApis(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getApisAsync(array $args = [])
 * @method \Aws\Result getAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getAuthorizerAsync(array $args = [])
 * @method \Aws\Result getAuthorizers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getAuthorizersAsync(array $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @method \Aws\Result getDeployments(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDeploymentsAsync(array $args = [])
 * @method \Aws\Result getDomainName(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDomainNameAsync(array $args = [])
 * @method \Aws\Result getDomainNames(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDomainNamesAsync(array $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @method \Aws\Result getIntegrationResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getIntegrationResponseAsync(array $args = [])
 * @method \Aws\Result getIntegrationResponses(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getIntegrationResponsesAsync(array $args = [])
 * @method \Aws\Result getIntegrations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getIntegrationsAsync(array $args = [])
 * @method \Aws\Result getModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getModelAsync(array $args = [])
 * @method \Aws\Result getModelTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getModelTemplateAsync(array $args = [])
 * @method \Aws\Result getModels(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getModelsAsync(array $args = [])
 * @method \Aws\Result getRoute(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRouteAsync(array $args = [])
 * @method \Aws\Result getRouteResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRouteResponseAsync(array $args = [])
 * @method \Aws\Result getRouteResponses(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRouteResponsesAsync(array $args = [])
 * @method \Aws\Result getRoutes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRoutesAsync(array $args = [])
 * @method \Aws\Result getStage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getStageAsync(array $args = [])
 * @method \Aws\Result getStages(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getStagesAsync(array $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTagsAsync(array $args = [])
 * @method \Aws\Result getVpcLink(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getVpcLinkAsync(array $args = [])
 * @method \Aws\Result getVpcLinks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getVpcLinksAsync(array $args = [])
 * @method \Aws\Result importApi(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise importApiAsync(array $args = [])
 * @method \Aws\Result reimportApi(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise reimportApiAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateApi(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateApiAsync(array $args = [])
 * @method \Aws\Result updateApiMapping(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateApiMappingAsync(array $args = [])
 * @method \Aws\Result updateAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAuthorizerAsync(array $args = [])
 * @method \Aws\Result updateDeployment(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDeploymentAsync(array $args = [])
 * @method \Aws\Result updateDomainName(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDomainNameAsync(array $args = [])
 * @method \Aws\Result updateIntegration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateIntegrationAsync(array $args = [])
 * @method \Aws\Result updateIntegrationResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateIntegrationResponseAsync(array $args = [])
 * @method \Aws\Result updateModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateModelAsync(array $args = [])
 * @method \Aws\Result updateRoute(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRouteAsync(array $args = [])
 * @method \Aws\Result updateRouteResponse(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRouteResponseAsync(array $args = [])
 * @method \Aws\Result updateStage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateStageAsync(array $args = [])
 * @method \Aws\Result updateVpcLink(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateVpcLinkAsync(array $args = [])
 */
class ApiGatewayV2Client extends AwsClient {}
